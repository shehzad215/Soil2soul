<div id="ourJourneyIteneriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Iteneries'), array('controller'=>'our_journey_iteneries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'our_journey_iteneries', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'day'=>__('Day'), 'title'=>__('Title'), 'description'=>__('Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'ourJourneyIteneriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#ourJourneyIteneriesAjax'));?>
<div class="ourJourneyIteneries index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Journey Iteneries'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				/*$dropdownMenuLink[] = $this->Bs->link(__('New Our Journey Itenery'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
                <?php echo $this->Bs->toggleColumns(array(), 'ourJourneyIteneriesTable'); ?>
            </div>
            <div id="ourJourneyIteneriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('OurJourny.name', __('Our Journy')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('day', __('Day')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('description', __('Description')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ourJourneyIteneries as $ourJourneyItenery): ?>
				<tr class='<?php echo 'tr_'.$ourJourneyItenery['OurJourneyItenery']['id']; ?>'>
					<td class='hide'><?php echo h($ourJourneyItenery['OurJourneyItenery']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourneyItenery['OurJourny']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['day']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['title']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourneyItenery['OurJourneyItenery']['description']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($ourJourneyItenery['OurJourneyItenery']['active']); ?>" class ='activeClass'  data-value="<?php echo $ourJourneyItenery['OurJourneyItenery']['id'];?>" <?php  if($ourJourneyItenery['OurJourneyItenery']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($ourJourneyItenery['OurJourneyItenery']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($ourJourneyItenery['OurJourneyItenery']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'our_journey_iteneries', 'action'=>'edit', $ourJourneyItenery['OurJourneyItenery']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'our_journey_iteneries', 'action'=>'delete', $ourJourneyItenery['OurJourneyItenery']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'our_journey_iteneries', 'action'=>'view', $ourJourneyItenery['OurJourneyItenery']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var iternaryid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'our_journey_iteneries','action'=>'is_active']); ?>",
          data: {"iternaryid":iternaryid,"checkedid":checkedid} 
        });
	});
	
</script>