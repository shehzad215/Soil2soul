<div id="galleryCategoriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Gallery Categories'), array('controller'=>'galleries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'gallery_categories', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'page_title'=>__('Page Title'), 'page_slug'=>__('Page Slug'), 'page_url'=>__('Page Url'), 'meta_description'=>__('Meta Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'galleryCategoriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#galleryCategoriesAjax'));?>
<div class="galleryCategories index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Gallery Categories'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Galleries'), array('controller'=>'galleries', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Gallery Category'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'galleryCategoriesTable'); ?>
            </div>
            <div id="galleryCategoriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('image_file', __('Image File')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        
                        <th class="text-center"><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($galleryCategories as $galleryCategory): ?>
				<tr class='<?php echo 'tr_'.$galleryCategory['GalleryCategory']['id']; ?>'>
					<td class='hide'><?php echo h($galleryCategory['GalleryCategory']['id']); ?>&nbsp;</td>
					<td class=''>
						<?php echo $this->bs->image('GalleryCategory.image_file',$galleryCategory,['class'=>'imagefile']);?>
						&nbsp;</td>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['name']); ?>&nbsp;</td>
					
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($galleryCategory['GalleryCategory']['active']); ?>" class ='activeClass'  data-value="<?php echo $galleryCategory['GalleryCategory']['id'];?>" <?php  if($galleryCategory['GalleryCategory']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($galleryCategory['GalleryCategory']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($galleryCategory['GalleryCategory']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'gallery_categories', 'action'=>'edit', $galleryCategory['GalleryCategory']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'gallery_categories', 'action'=>'delete', $galleryCategory['GalleryCategory']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
							$dropdownMenu[] = $this->Bs->menuLink(__('Gallery'), array('controller'=>'galleries', 'action'=>'index','gallery_category_id'=>$galleryCategory['GalleryCategory']['id']), array('icon'=>'list'));
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'gallery_categories', 'action'=>'view', $galleryCategory['GalleryCategory']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
					?>
					</td>
				</tr>
			<?php endforeach; ?>
                </tbody>
                </table>
            </div>
            
            <?php echo $this->Bs->paginationRow(); ?>
            <?php echo $this->Js->writeBuffer(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
/*Active Fucntionality*/
	$('.activeClass').change(function(){
		var checkedid = $(this).is(':checked');
		var galcatid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'gallery_categories','action'=>'is_active']); ?>",
          data: {"galcatid":galcatid,"checkedid":checkedid} 
        });
	});
	
</script>