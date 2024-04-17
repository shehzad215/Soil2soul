<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog'), array('controller'=>'posts', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="postsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box blue-hoki'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blog'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				// $this->Bs->menuLink(__('Blog'), array('controller'=>'posts', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				// $this->Bs->menuLink(__('Template Layouts'), array('controller'=>'template_layouts', 'action'=>'index'), array('icon'=>'list')),
				// $this->Bs->menuLink(__('Post Images'), array('controller'=>'post_images', 'action'=>'index'), array('icon'=>'list')),
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $post['Post']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn default'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $post['Post']['id']), array('icon'=>'trash-o', 'class'=>'btn default'));
			endif;
				$dropdownMenuLink[] = $this->Bs->link(__('Blog'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn default'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
                <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="" class="reload" data-original-title="" title="" data-url="<?php echo $this->Html->url(array('controller'=>'posts', 'action'=>'admin_view'))?>"> </a> -->
            </div>			
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($post['Post']['id']); ?>&nbsp;</td>
				</tr>
				<!-- <tr>
					<th class=' col-md-2'><?php echo __('Parent Post'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($post['ParentPost']['title'], array('controller'=>'posts', 'action'=>'view', $post['ParentPost']['id'])); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Lft'); ?></th>
					<td class=''><?php echo h($post['Post']['lft']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Rght'); ?></th>
					<td class=''><?php echo h($post['Post']['rght']); ?>&nbsp;</td>
				</tr> -->
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><?php echo $this->bs->getBooleanValue($post['Post']['active'], $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Title'); ?></th>
					<td class=''><?php echo h($post['Post']['title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Category'); ?></th>
					<td class=''><?php echo $this->Bs->bsLabel(Hash::extract($post, 'BlogCategory.{n}.name')); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Body'); ?></th>
					<td class=''><?php echo $post['Post']['body']; ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Cover Image'); ?></th>
					<td class=''><?php echo $this->Bs->image('Post.cover_image', $post, array('width'=>'300', 'height'=>'100')); ?>&nbsp;</td>
                </tr>    
                <!-- <tr>
                    <th class=' col-md-2'><?php //echo __('Featured Image'); ?></th>
                    <td class=''><?php //echo $this->Bs->image('Post.featured_image', $post, array('width'=>'100', 'height'=>'100')); ?>&nbsp;</td>
                </tr> -->  
				<!-- <tr>
					<th class=' col-md-2'><?php echo __('Template Layout'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($post['TemplateLayout']['name'], array('controller'=>'template_layouts', 'action'=>'view', $post['TemplateLayout']['id'])); ?>&nbsp;
					</td>
				</tr> -->
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Title'); ?></th>
					<td class=''><?php echo h($post['Post']['meta_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Keyword'); ?></th>
					<td class=''><?php echo h($post['Post']['meta_keyword']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($post['Post']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($post['Post']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($post['Post']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div id="relatedBlogComments" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'blog_comments', 'action'=>'index', 'post_id'=>$post['Post']['id']));?>"></div>