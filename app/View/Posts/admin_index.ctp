<div id="postsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blogs'), array('controller'=>'posts', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'posts', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'title'=>__('Title'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'postsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#postsAjax'));?>
<div class="posts index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box blue-hoki'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blogs'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				//$this->Bs->menuLink(__('Blogs'), array('controller'=>'posts', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				//$this->Bs->menuLink(__('Template Layouts'), array('controller'=>'template_layouts', 'action'=>'index'), array('icon'=>'list')),
				//$this->Bs->menuLink(__('Post Images'), array('controller'=>'post_images', 'action'=>'index'), array('icon'=>'list')),
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Blog'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn default'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'postsTable'); ?>
            </div>
            <div id="postsTable" class="tableData">
            <div class="table-toolbar row">
            	<div class="col-md-12">
	            <?php
	            	$dropdownMenuLinkMultipleActions = array();
					$dropdownMenuMultipleActions = array(
						$this->Bs->menuLink(__('Delete Selected Blog'), '#', array('class'=>'group-actions','icon'=>'trash-o','data-url'=>$this->Html->url(array('controller'=>'posts', 'action'=>'delete')), 'li'=>['class'=>'disabled']) ),

						$this->Bs->menuLink(__('Active Selected Blog'), '#', array('class'=>'group-actions','icon'=>'fa fa-check','data-url'=>$this->Html->url(array('controller'=>'posts', 'action'=>'activeinactive',1)), 'li'=>['class'=>'disabled']) ),

						$this->Bs->menuLink(__('Inactive Selected Blog'), '#', array('class'=>'group-actions','icon'=>'fa fa-check','data-url'=>$this->Html->url(array('controller'=>'posts', 'action'=>'activeinactive',0)),'li'=>['class'=>'disabled']) )
					);

					$dropdownMenuLinkMultipleActions[] = $this->Bs->link(__('Actions'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn default'));
					echo $this->Bs->dropdown($dropdownMenuLinkMultipleActions, $dropdownMenuMultipleActions, array('type'=>'split', 'groupClass'=>'btn-group-sm posts-checkbox-actions', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
				?>
				</div>
            </div>
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                		<th class=""><input type="checkbox" data-set="posts-checkbox" data-toggle='group-checkable'>&nbsp;</th>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-4"><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('cover_image', __('Cover Image')); ?></th>
                        <th class=""><?php echo __('Total Comments'); ?></th>
                        <th class="col-md-4"><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
				<tr class='<?php echo 'tr_'.$post['Post']['id']; ?>'>
					<td class=''><input data-set-row="posts-checkbox"  type="checkbox" name="check[]" value="<?php echo h($post['Post']['id']); ?>">&nbsp;</td>
					<td class='hide'><?php echo h($post['Post']['id']); ?>&nbsp;</td>
					<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                    <td class=''><?php echo $this->Bs->image('Post.cover_image', $post, array('width'=>'220', 'height'=>'71')); ?>&nbsp;</td>
                    <td class=''><?php  echo  $this->Bs->link(($post['Post']['totalUserComments']), array('controller'=>'blog_comments', 'action'=>'index', 'Post.id' => $post['Post']['id'],  'admin' => true), array('icon'=>'comment'));?>&nbsp;</td>
					<td><?php echo $this->bs->getBooleanValue($post['Post']['active'], $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;</td>
					
					<td class=''><?php echo $this->Bs->niceShort($post['Post']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($post['Post']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
                        $dropdownMenu[] = $this->Bs->menuLink(__('View'), array('controller'=>'posts', 'action'=>'view', $post['Post']['id']), array('icon'=>'search'));
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								
                            $dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('controller'=>'posts', 'action'=>'edit', $post['Post']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-default linkrow') );
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'posts', 'action'=>'delete', $post['Post']['id'], 'admin' => true), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
			
						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'ul'=>array('class'=>'pull-right')));
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