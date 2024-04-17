<div id="enquiriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Enquiries'), array('controller'=>'enquiries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'enquiries', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'TourCost.id'=>__('Tour Cost'), 'Currency.title'=>__('Currency'), 'journey_date'=>__('Journey Date'), 'no_of_adults'=>__('No Of Adults'), 'no_of_child'=>__('No Of Child'), 'total_cost'=>__('Total Cost'), 'cust_name'=>__('Cust Name'), 'cust_email'=>__('Cust Email'), 'contact_no'=>__('Contact No'), 'nationality'=>__('Nationality'), 'message'=>__('Message'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'enquiriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#enquiriesAjax'));?>
<div class="enquiries index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Enquiries'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Tour Costs'), array('controller'=>'tour_costs', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Currencies'), array('controller'=>'currencies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				/*$dropdownMenuLink[] = $this->Bs->link(__('New Enquiry'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
                <?php echo $this->Bs->toggleColumns(array(), 'enquiriesTable'); ?>
            </div>
            <div id="enquiriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('OurJourny.name', __('Our Journy')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('created', __('Enquiry Date')); ?></th>
                        <!-- <th class=""><?php //echo $this->Paginator->sort('TourCost.id', __('Tour Cost')); ?></th> -->
                        <!-- <th class=""><?php //echo $this->Paginator->sort('Currency.title', __('Currency')); ?></th> -->
                        <!-- <th class=""><?php //echo $this->Paginator->sort('journey_date', __('Journey Date')); ?></th> -->
                        <th class=""><?php echo $this->Paginator->sort('no_of_adults', __('Enquiry Details')); ?></th>
                        
                        <th class=""><?php echo $this->Paginator->sort('cust_name', __('Cust Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('cust_email', __('Cust Email')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('contact_no', __('Contact No')); ?></th>

                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($enquiries as $enquiry): ?>
				<tr class='<?php echo 'tr_'.$enquiry['Enquiry']['id']; ?>'>
					<td class='hide'><?php echo h($enquiry['Enquiry']['id']); ?>&nbsp;</td>
		
					<td class=''><?php echo h($enquiry['OurJourny']['name']); ?>&nbsp;</td>
										<td class=''><?php echo $this->Bs->niceShortDate($enquiry['Enquiry']['created']); ?></td>
					<!-- <td class=''><?php //echo h($enquiry['TourCost']['id']); ?>&nbsp;</td> -->
					
					
					<td class=''> 
						<?php echo  'Journey Date  - ' .$this->Bs->niceShortDate($enquiry['Enquiry']['journey_date']); ?><br>
						<?php echo 'No of Adults - ' .$enquiry['Enquiry']['no_of_adults']; ?><br>
								<?php echo 'No of Child - ' .$enquiry['Enquiry']['no_of_child']; ?> <br>
								<?php echo 'Total Cost - '.$enquiry['Currency']['sign'].' '.$enquiry['Enquiry']['total_cost']; ?> &nbsp;	
					</td>
					
			
					<td class=''><?php echo h($enquiry['Enquiry']['cust_name']); ?>&nbsp;</td>
					<td class=''><?php echo h($enquiry['Enquiry']['cust_email']); ?>&nbsp;</td>
					<td class=''><?php echo h($enquiry['Enquiry']['contact_no']); ?>&nbsp;</td>

					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								/*$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'enquiries', 'action'=>'edit', $enquiry['Enquiry']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));*/
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'enquiries', 'action'=>'delete', $enquiry['Enquiry']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'enquiries', 'action'=>'view', $enquiry['Enquiry']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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