<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Tour Cost Details'), array('controller'=>'tour_cost_details', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'tour_cost_details', 'action'=>'view', $tourCostDetail['TourCostDetail']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="tourCostDetailsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Tour Cost Detail'); ?></div>
            
           <div class="actions">
    		<?php
				$dropdownMenuLink = array();
				$dropdownMenu = array();

				if($isLoggedIn && $userRole['edit']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $tourCostDetail['TourCostDetail']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
				endif;
				if($isLoggedIn && $userRole['delete']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $tourCostDetail['TourCostDetail']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
					<td class='hide id'><?php echo h($tourCostDetail['TourCostDetail']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Our Journy'); ?></th>
					<td class=''>
						<?php echo $tourCostDetail['OurJourny']['name']; ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Date'); ?></th>
					<td class=''>
						<?php echo date_format(date_create($tourCostDetail['TourCost']['date']),'jS M Y'); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Tour Cost Type'); ?></th>
					<td class=''>
						<?php echo $tourCostDetail['TourCostType']['name']; ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Price'); ?></th>
					<td class=''><?php echo h($tourCostDetail['Currency']['sign'].' '.$tourCostDetail['TourCostDetail']['price'].'/-'); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                                   <?php echo $this->Bs->getBooleanValue($tourCostDetail['TourCostDetail']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($tourCostDetail['TourCostDetail']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($tourCostDetail['TourCostDetail']['modified']); ?>&nbsp;</td>
	
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