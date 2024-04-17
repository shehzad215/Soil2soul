<div id="blogCommentsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Comments'), array('controller'=>'blogs', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'blog_comments', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'Blog.title'=>__('Blog'), 'name'=>__('Name'), 'email'=>__('Email'), 'comments'=>__('Comments'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'blogCommentsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#blogCommentsAjax'));?>
<div class="blogComments index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blog Comments'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Blogs'), array('controller'=>'blogs', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				/*$dropdownMenuLink[] = $this->Bs->link(__('New Blog Comment'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
                <?php echo $this->Bs->toggleColumns(array(), 'blogCommentsTable'); ?>
            </div>
            <div id="blogCommentsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo 'Blog'; ?></th>
                        <th class=""><?php echo 'Name'; ?></th>
                        <th class=""><?php echo 'Email'; ?></th>
                        <th class=""><?php echo 'Comments'; ?></th>
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class=""><?php echo 'Created'; ?></th>
                        <th class=""><?php echo 'Modified'; ?></th>
                        <th class="actions "><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogComments as $blogComment): ?>
				<tr class='<?php echo 'tr_'.$blogComment['BlogComment']['id']; ?>'>
					<td class='hide'><?php echo h($blogComment['BlogComment']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogComment['Blog']['title']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogComment['BlogComment']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogComment['BlogComment']['email']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogComment['BlogComment']['comments']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($blogComment['BlogComment']['active']); ?>" class ='activeClass'  data-value="<?php echo $blogComment['BlogComment']['id'];?>" <?php  if($blogComment['BlogComment']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($blogComment['BlogComment']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($blogComment['BlogComment']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								/*$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'blog_comments', 'action'=>'edit', $blogComment['BlogComment']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));*/
							endif;
							if($userRole['delete']) :
								/*$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'blog_comments', 'action'=>'delete', $blogComment['BlogComment']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );*/
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'blog_comments', 'action'=>'view', $blogComment['BlogComment']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var commentid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'blog_comments','action'=>'is_active']); ?>",
          data: {"commentid":commentid,"checkedid":checkedid} 
        });
	});
	
</script>