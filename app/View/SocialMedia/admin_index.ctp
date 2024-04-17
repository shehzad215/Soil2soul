<div id="socialMediaAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Social Media'), array('controller'=>'social_media', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'social_media', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'icon_class'=>__('Icon Class'), 'url'=>__('Url'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'socialMediaTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#socialMediaAjax'));?>
<div class="socialMedia index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Social Media'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Social Media'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'socialMediaTable'); ?>
            </div>
            <div id="socialMediaTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                       <!--  <th class=""><?php //echo $this->Paginator->sort('icon_class', __('Icon Class')); ?></th> -->
                        <th class=""><?php echo $this->Paginator->sort('image_file', __('Image')); ?></th> 
                        <th class=""><?php echo $this->Paginator->sort('url', __('Url')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($socialMedia as $socialMedia): ?>
				<tr class='<?php echo 'tr_'.$socialMedia['SocialMedia']['id']; ?>'>
					<td class='hide'><?php echo h($socialMedia['SocialMedia']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($socialMedia['SocialMedia']['name']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->image('SocialMedia.image_file',$socialMedia,['class'=>'imageicon']); ?>&nbsp;</td>
					<td class=''><?php echo h($socialMedia['SocialMedia']['url']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($socialMedia['SocialMedia']['active']); ?>" class ='activeClass'  data-value="<?php echo $socialMedia['SocialMedia']['id'];?>" <?php  if($socialMedia['SocialMedia']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($socialMedia['SocialMedia']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($socialMedia['SocialMedia']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'social_media', 'action'=>'edit', $socialMedia['SocialMedia']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'social_media', 'action'=>'delete', $socialMedia['SocialMedia']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'social_media', 'action'=>'view', $socialMedia['SocialMedia']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var socialid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'SocialMedia','action'=>'is_active']); ?>",
          data: {"socialid":socialid,"checkedid":checkedid} 
        });
	});
	
</script>