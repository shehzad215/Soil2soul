<div id="blogsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blogs'), array('controller'=>'blogs', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'blogs', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'title'=>__('Title'), 'page_slug'=>__('Page Slug'), 'header_text'=>__('Header Text'), 'image_file'=>__('Image File'), 'description'=>__('Description'), 'page_url'=>__('Page Url'), 'page_title'=>__('Page Title'), 'meta_keyword'=>__('Meta Keyword'), 'meta_description'=>__('Meta Description'), 'blog_date'=>__('Blog Date'), 'active'=>__('Active'), );
	echo $this->Bs->search($arraySearch, 'blogsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#blogsAjax'));?>
<div class="blogs index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blogs'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Blog'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'blogsTable'); ?>
            </div>
            <div id="blogsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id "><?php echo 'Id'; ?></th>
                        <th class=""><?php echo 'Image File'; ?></th>
                        <th class=""><?php echo 'Blog Category'; ?></th>
                        <th class="col-sm-3"><?php echo 'Title'; ?></th>
                         <th class=""><?php echo 'Blog Date'; ?></th>
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class=""><?php echo 'Created'; ?></th>
                        <th class=""><?php echo 'Modified'; ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogs as $blog): ?>
				<tr class='<?php echo 'tr_'.$blog['Blog']['id']; ?>'>
					<td class='hide'><?php echo h($blog['Blog']['id']); ?>&nbsp;</td>
					<td class=''>
						<?php //echo h($blog['Blog']['image_file']); ?>&nbsp;
						<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>'','class'=>'imageFile']); ?>

					</td>
					<td class=''><?php echo h((!empty($blog['BlogCategory']['name'])) ? $blog['BlogCategory']['name'] : '---'); ?>&nbsp;</td>
					<td class=''><?php echo h($blog['Blog']['title']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShortDate($blog['Blog']['blog_date']); ?>&nbsp;</td>
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($blog['Blog']['active']); ?>" class ='activeClass'  data-value="<?php echo $blog['Blog']['id'];?>" <?php  if($blog['Blog']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($blog['Blog']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($blog['Blog']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'blogs', 'action'=>'edit', $blog['Blog']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'blogs', 'action'=>'delete', $blog['Blog']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
							$dropdownMenu[] = $this->Bs->menuLink(__('Blog Comments'), array('controller'=>'blog_comments', 'action'=>'index', 'blog_id'=>$blog['Blog']['id']), array('icon'=>'comment'));
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'blogs', 'action'=>'view', $blog['Blog']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow') );
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
		var blogsid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'Blogs','action'=>'is_active']); ?>",
          data: {"blogsid":blogsid,"checkedid":checkedid} 
        });
	});
	
</script>	