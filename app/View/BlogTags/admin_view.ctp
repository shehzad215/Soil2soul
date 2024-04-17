<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Tags'), array('controller'=>'blog_tags', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'blog_tags', 'action'=>'view', $blogTag['BlogTag']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="blogTagsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blog Tag'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $blogTag['BlogTag']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $blogTag['BlogTag']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				/*$dropdownMenuLink[] = $this->Bs->link(__('Blog Tags'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
					<td class='hide id'><?php echo h($blogTag['BlogTag']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($blogTag['BlogTag']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p><?php echo $this->Bs->getBooleanValue($blogTag['BlogTag']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>
						&nbsp;</p></td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Title'); ?></th>
					<td class=''><?php echo h($blogTag['BlogTag']['page_title']); ?>&nbsp;</td>
				</tr>
					<th class=' col-md-2'><?php echo __('Page Slug'); ?></th>
					<td class=''><?php echo h($blogTag['BlogTag']['page_slug']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Url'); ?></th>
					<td class=''><?php echo h($blogTag['BlogTag']['page_url']); ?>&nbsp;</td>
				</tr>

				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($blogTag['BlogTag']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($blogTag['BlogTag']['created']); ?>&nbsp;</td>
				</tr>	
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($blogTag['BlogTag']['modified']); ?>&nbsp;</td>
				</tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">

</div>
</div>