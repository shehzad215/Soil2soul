<div id="videoCategoriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Video Categories'), array('controller'=>'video_categories', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'video_categories', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'order'=>__('Order'), 'name'=>__('Name'), 'page_title'=>__('Page Title'), 'page_slug'=>__('Page Slug'), 'page_url'=>__('Page Url'), 'image_file'=>__('Image File'), 'active'=>__('Active'), 'meta_description'=>__('Meta Description'), 'meta_keyword'=>__('Meta Keyword'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'videoCategoriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#videoCategoriesAjax'));?>
<div class="videoCategories index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Video Categories'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Video Category'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'videoCategoriesTable'); ?>
            </div>
            <div id="videoCategoriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('order', __('Order')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('image_file', __('Image File')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($videoCategories as $videoCategory): ?>
				<tr>
					<td class='hide'><?php echo h($videoCategory['VideoCategory']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($videoCategory['VideoCategory']['order']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->image('VideoCategory.image_file', $videoCategory, array('class'=>'imagefile')); ?>&nbsp;</td>
					<td class=''><?php echo h($videoCategory['VideoCategory']['name']); ?>&nbsp;</td>
					
					<td class=''><p>
                                   <?php echo $this->Bs->getBooleanValue($videoCategory['VideoCategory']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>
					<td class=''><?php echo $this->Bs->niceShort($videoCategory['VideoCategory']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($videoCategory['VideoCategory']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'video_categories', 'action'=>'edit', $videoCategory['VideoCategory']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'video_categories', 'action'=>'delete', $videoCategory['VideoCategory']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'video_categories', 'action'=>'view', $videoCategory['VideoCategory']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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