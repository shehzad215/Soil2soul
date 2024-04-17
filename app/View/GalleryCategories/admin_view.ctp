<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Gallery Categories'), array('controller'=>'gallery_categories', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'gallery_categories', 'action'=>'view', $galleryCategory['GalleryCategory']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="galleryCategoriesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Gallery Category'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Galleries'), array('controller'=>'galleries', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $galleryCategory['GalleryCategory']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $galleryCategory['GalleryCategory']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				/*$dropdownMenuLink[] = $this->Bs->link(__('Gallery Categories'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($galleryCategory['GalleryCategory']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['name']); ?>&nbsp;</td>
				</tr>
				
				<tr>
					<th class=' col-md-2'><?php echo __('Image File'); ?></th>
					<td class=''><?php echo $this->bs->image('GalleryCategory.image_file',$galleryCategory,['class'=>'imagefile']);?></td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Title'); ?></th>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['page_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Slug'); ?></th>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['page_slug']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Url'); ?></th>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['page_url']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($galleryCategory['GalleryCategory']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                                   <?php echo $this->Bs->getBooleanValue($galleryCategory['GalleryCategory']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($galleryCategory['GalleryCategory']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($galleryCategory['GalleryCategory']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
	
	<div id="relatedGalleries" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'galleries', 'action'=>'index', 'gallery_category_id'=>$galleryCategory['GalleryCategory']['id']));?>">
	
	</div>

</div>
</div>