<div id="bookingFacilitiesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Booking Facilities'), array('controller'=>'booking_facilities', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'booking_facilities', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'image_file'=>__('Image File'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'bookingFacilitiesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#bookingFacilitiesAjax'));?>
<div class="bookingFacilities index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Booking Facilities'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Booking Facility'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'bookingFacilitiesTable'); ?>
            </div>
            <div id="bookingFacilitiesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="text-center col-md-1"><?php echo 'Icon'; ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions "><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($bookingFacilities as $bookingFacility): ?>
				<tr class='<?php echo 'tr_'.$bookingFacility['BookingFacility']['id']; ?>'>
					<td class='hide'><?php echo h($bookingFacility['BookingFacility']['id']); ?>&nbsp;</td>
					<td class='text-center'><?php echo $this->Bs->image('BookingFacility.image_file',$bookingFacility,['alt'=>'','class'=>'imageicon']); ?></td>
					<td class=''><?php echo h($bookingFacility['BookingFacility']['name']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($bookingFacility['BookingFacility']['active']); ?>" class ='activeClass'  data-value="<?php echo $bookingFacility['BookingFacility']['id'];?>" <?php  if($bookingFacility['BookingFacility']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($bookingFacility['BookingFacility']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($bookingFacility['BookingFacility']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'booking_facilities', 'action'=>'edit', $bookingFacility['BookingFacility']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'booking_facilities', 'action'=>'delete', $bookingFacility['BookingFacility']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'booking_facilities', 'action'=>'view', $bookingFacility['BookingFacility']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var bookingid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'booking_facilities','action'=>'is_active']); ?>",
          data: {"bookingid":bookingid,"checkedid":checkedid} 
        });
	});
	
</script>