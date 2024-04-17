<div id="blogAuthorsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Authors'), array('controller'=>'blog_authors', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'blog_authors', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'author_name'=>__('Author Name'), 'author_image'=>__('Author Image'), 'note'=>__('Note'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'blogAuthorsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#blogAuthorsAjax'));?>
<div class="blogAuthors index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blog Authors'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Blog Author'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'blogAuthorsTable'); ?>
            </div>
            <div id="blogAuthorsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo 'Image'; ?></th>
                        <th class="col-sm-1"><?php echo 'Author Name'; ?></th>      
                        <th class=""><?php echo 'Note'; ?></th>
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class=""><?php echo 'Created'; ?></th>
                        <th class=""><?php echo 'Modified'; ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogAuthors as $blogAuthor): ?>
				<tr class='<?php echo 'tr_'.$blogAuthor['BlogAuthor']['id']; ?>'>
					<td class='hide'><?php echo h($blogAuthor['BlogAuthor']['id']); ?>&nbsp;</td>
					
					<td class=''><?php echo $this->Bs->image('BlogAuthor.author_image',$blogAuthor,['class'=>'imageicon']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogAuthor['BlogAuthor']['author_name']); ?>&nbsp;</td>
					<td class=''><?php echo h($blogAuthor['BlogAuthor']['note']); ?>&nbsp;</td>
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($blogAuthor['BlogAuthor']['active']); ?>" class ='activeClass'  data-value="<?php echo $blogAuthor['BlogAuthor']['id'];?>" <?php  if($blogAuthor['BlogAuthor']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($blogAuthor['BlogAuthor']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($blogAuthor['BlogAuthor']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'blog_authors', 'action'=>'edit', $blogAuthor['BlogAuthor']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'blog_authors', 'action'=>'delete', $blogAuthor['BlogAuthor']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'blog_authors', 'action'=>'view', $blogAuthor['BlogAuthor']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var blogauthorid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'blog_authors','action'=>'is_active']); ?>",
          data: {"blogauthorid":blogauthorid,"checkedid":checkedid} 
        });
	});
	
</script>