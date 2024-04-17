<div id="packagesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Packages'), array('controller'=>'packages', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'packages', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'page_slug'=>__('Page Slug'), 'page_title'=>__('Page Title'), 'page_ulr'=>__('Page Ulr'), 'image_file'=>__('Image File'), 'description'=>__('Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'packagesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#packagesAjax'));?>
<div class="packages index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Packages'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Package'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'packagesTable'); ?>
            </div>
            <div id="packagesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-sm-1"><?php echo $this->Paginator->sort('image_file', __('Image')); ?></th>
                        <th class=""><?php echo 'Short Name'; ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('display_on_homepage', __('Display Homepage')); ?></th>
                        <th class="actions "><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($packages as $package): ?>
				<tr class='<?php echo 'tr_'.$package['Package']['id']; ?>'>
					<td class='hide'><?php echo h($package['Package']['id']); ?>&nbsp;</td>
					<td class=''>
						<?php //echo h($blog['Blog']['image_file']); ?>&nbsp;
						<?php echo $this->Bs->image('Package.image_file',$package,['alt'=>'','class'=>'imageFile']); ?>

					</td>
					<td class=''><?php echo h($package['Package']['short_name']); ?>&nbsp;</td>
					<td class=''><?php echo h($package['Package']['name']); ?>&nbsp;</td>
					
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($package['Package']['active']); ?>" class ='activeClass'  data-value="<?php echo $package['Package']['id'];?>" <?php  if($package['Package']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($package['Package']['display_on_homepage']); ?>" class ='displayClass'  data-value="<?php echo $package['Package']['id'];?>" <?php  if($package['Package']['display_on_homepage'] == 1){ ?> checked <?php }?>>&nbsp;</td>
                   
					
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'packages', 'action'=>'edit', $package['Package']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'packages', 'action'=>'delete', $package['Package']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
							$dropdownMenu[] = $this->Bs->menuLink(__('Package Trails'), array('controller'=>'our_journies', 'action'=>'index', 'OurJourny.package_id'=>$package['Package']['id']), array('icon'=>'plus'));
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'packages', 'action'=>'view', $package['Package']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow') );
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
		var packageid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'Packages','action'=>'is_active']); ?>",
          data: {"packageid":packageid,"checkedid":checkedid} 
        });
	});

	$('.displayClass').change(function(){
		var checkedid = $(this).is(':checked');
		var packageid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'Packages','action'=>'is_display']); ?>",
          data: {"packageid":packageid,"checkedid":checkedid} 
        });
	});

	
	
</script>