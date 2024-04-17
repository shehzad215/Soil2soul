<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Enquiries'), array('controller'=>'enquiries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'enquiries', 'action'=>'view', $enquiry['Enquiry']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="enquiriesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Enquiry'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Tour Costs'), array('controller'=>'tour_costs', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Currencies'), array('controller'=>'currencies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['edit']) : 
				/*$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $enquiry['Enquiry']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $enquiry['Enquiry']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				/*$dropdownMenuLink[] = $this->Bs->link(__('Enquiries'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
					<td class='hide id'><?php echo h($enquiry['Enquiry']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Our Journy'); ?></th>
					<td class=''>
						<?php echo h($enquiry['OurJourny']['name']); ?>&nbsp;
					</td>
				</tr>
<!-- 				<tr>
					<th class=' col-md-2'><?php //echo __('Tour Cost'); ?></th>
					<td class=''>
						<?php //echo h($enquiry['TourCost']['id']); ?>&nbsp;
					</td>
				</tr> -->
				<tr>
					<th class=' col-md-2'><?php echo __('Currency'); ?></th>
					<td class=''>
						<?php echo h($enquiry['Currency']['title']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Journey Date'); ?></th>
					<td class=''><?php echo $this->Bs->niceShortDate($enquiry['Enquiry']['journey_date']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('No Of Adults'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['no_of_adults']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('No Of Child'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['no_of_child']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Total Cost'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['total_cost']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Cust Name'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['cust_name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Cust Email'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['cust_email']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Contact No'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['contact_no']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Country'); ?></th>
					<td class=''><?php echo h($enquiry['Country']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Message'); ?></th>
					<td class=''><?php echo h($enquiry['Enquiry']['message']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Enquiry Date'); ?></th>
					<td class=''><?php echo $this->Bs->niceShortDate($enquiry['Enquiry']['created']); ?>&nbsp;</td>
				</tr>
					
	
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