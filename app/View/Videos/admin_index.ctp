<div id="videosAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Videos'), array('controller'=>'videos', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'videos', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'order'=>__('Order'), 'video_link'=>__('Video Link'), 'description'=>__('Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'videosTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#videosAjax'));?>
<div class="videos index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Videos'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Video'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'videosTable'); ?>
            </div>
            <div id="videosTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo 'Order'; ?></th>
                        <th class=""><?php echo 'Image'; ?></th>  
                        <th class=""><?php echo 'Category'; ?></th>
                        <th class=""><?php echo 'Title'; ?></th>                         
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class=""><?php echo 'Disp* Home'; ?></th>
                        <th class="actions "><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($videos as $video): ?>
				<tr class='<?php echo 'tr_'.$video['Video']['id']; ?>'>
					<td class='hide'><?php echo h($video['Video']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($video['Video']['order']); ?>&nbsp;</td>

					<td class=''><?php echo $this->Bs->image('Video.image_file',$video,['class'=>'imagefile']); ?>&nbsp;</td>	
					<td class=''><?php echo h((!empty($video['VideoCategory']['name'])) ? $video['VideoCategory']['name'] : '---'); ?>&nbsp;</td>	
					<td class=''><?php echo h($video['Video']['title']); ?>&nbsp;</td>	
					

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($video['Video']['active']); ?>" class ='activeClass'  data-value="<?php echo $video['Video']['id'];?>" <?php  if($video['Video']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($video['Video']['is_display_homepage']); ?>" class ='displayClass'  data-value="<?php echo $video['Video']['id'];?>" <?php  if($video['Video']['is_display_homepage'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'videos', 'action'=>'edit', $video['Video']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'videos', 'action'=>'delete', $video['Video']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'videos', 'action'=>'view', $video['Video']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var videoid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'videos','action'=>'is_active']); ?>",
          data: {"videoid":videoid,"checkedid":checkedid} 
        });
	});
/*Display Fucntionality*/
	$('.displayClass').change(function(){
		var checkedid = $(this).is(':checked');
		var videoid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'videos','action'=>'display_homepage']); ?>",
          data: {"videoid":videoid,"checkedid":checkedid} 
        });
	});
</script>