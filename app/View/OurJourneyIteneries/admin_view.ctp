<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Itinerary'), array('controller'=>'our_journey_iteneries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'our_journey_iteneries', 'action'=>'view', $ourJourneyItenery['OurJourneyItenery']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="ourJourneyIteneriesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Journey Itinerary'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $ourJourneyItenery['OurJourneyItenery']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $ourJourneyItenery['OurJourneyItenery']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				// $dropdownMenuLink[] = $this->Bs->link(__('Our Journey Iteneries'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($ourJourneyItenery['OurJourneyItenery']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Our Journey'); ?></th>
					<td class=''>
						<?php echo h($ourJourneyItenery['OurJourny']['name']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Day'); ?></th>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['day']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Title'); ?></th>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['title']); ?>&nbsp;</td>
				</tr>

				<tr>
					<th class=' col-md-2'><?php echo __('Description'); ?></th>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                                                <?php echo $this->Bs->getBooleanValue($ourJourneyItenery['OurJourneyItenery']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                                </p></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourJourneyItenery['OurJourneyItenery']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourJourneyItenery['OurJourneyItenery']['modified']); ?>&nbsp;</td>
	
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