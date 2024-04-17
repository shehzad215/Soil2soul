<div id="galleriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Galleries'), array('controller'=>'gallery_categories', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'GalleryCategory.name'=>__('Gallery Category'), 'order'=>__('Order'), 'name'=>__('Name'), 'image'=>__('Image'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'galleriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#galleriesAjax'));?>
<div class="galleries index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Galleries'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Gallery Categories'), array('controller'=>'gallery_categories', 'action'=>'index'), array('icon'=>'list')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Gallery'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'galleriesTable'); ?>
            </div>
            <div id="galleriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>  
                        <th class=""><?php echo 'Order'; ?></th>
                        <th class=""><?php echo 'Image'; ?></th>
                        <th class=""><?php echo 'Gallery Category'; ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo 'Name'; ?></th>
                        
                        
                        <th class="text-center"><?php echo 'Active'; ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo 'Created'; ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo 'Modified'; ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($galleries as $gallery): ?>
				<tr class='<?php echo 'tr_'.$gallery['Gallery']['id']; ?>'>
					<td class='hide'><?php echo h($gallery['Gallery']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($gallery['Gallery']['order']); ?>&nbsp;</td>
					<td class=''>
						<?php echo $this->bs->image('Gallery.image',$gallery,['class'=>'imagefile']);?>
						&nbsp;</td>	
					<td class=''><?php echo h($gallery['GalleryCategory']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($gallery['Gallery']['name']); ?>&nbsp;</td>
					
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($gallery['Gallery']['active']); ?>" class ='activeClass'  data-value="<?php echo $gallery['Gallery']['id'];?>" <?php  if($gallery['Gallery']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($gallery['Gallery']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($gallery['Gallery']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'galleries', 'action'=>'edit', $gallery['Gallery']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'galleries', 'action'=>'delete', $gallery['Gallery']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'galleries', 'action'=>'view', $gallery['Gallery']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var galleryid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'galleries','action'=>'is_active']); ?>",
          data: {"galleryid":galleryid,"checkedid":checkedid} 
        });
	});
	
</script>
