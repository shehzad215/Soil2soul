<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Booking Facilities'), array('controller'=>'booking_facilities', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'booking_facilities', 'action'=>'view', $bookingFacility['BookingFacility']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="bookingFacilitiesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Booking Facility'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $bookingFacility['BookingFacility']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $bookingFacility['BookingFacility']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
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
					<td class='hide id'><?php echo h($bookingFacility['BookingFacility']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Class'); ?></th>
					<td class=''><?php echo h($bookingFacility['BookingFacility']['class']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($bookingFacility['BookingFacility']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Image File'); ?></th>
					<td class=''><?php echo $this->Bs->image('BookingFacility.image_file',$bookingFacility,['alt'=>'','class'=>'iconAmenities']); ?></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                                   <?php echo $this->Bs->getBooleanValue($bookingFacility['BookingFacility']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($bookingFacility['BookingFacility']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($bookingFacility['BookingFacility']['modified']); ?>&nbsp;</td>
	
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