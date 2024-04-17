<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Tour Costs'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Tour Cost'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row tourCosts form">
<div class="col-md-12">
<h4><?php  echo 'Tour :- '.$this->request->data['OurJourny']['name'];?></h4>	
<nav class="navbar navbar-default listingBar">
	<ul class="nav navbar-nav" role="tablist">
		<?php echo $this->Bs->menuLink(__('Our Journey'), ['controller'=>'our_journies','action'=>'edit',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Tour Glimpse'),['controller'=>'tour_glimpses','action'=>'index','TourGlimpse.our_journy_id'=>$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Exclusions'),['controller'=>'our_journey_exlusions','action'=>'add',$journeyId]);?>
		<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Itineraries'), array('controller'=>'our_journey_iteneries', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Tour Cost'),'#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']); ?>
		<?php echo $this->Bs->menuLink(__('Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$journeyId));  ?>
		 <?php echo $this->Bs->menuLink(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'add',$journeyId)) ?>
	</ul>
</nav>	
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Tour Cost'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('Tour Cost Types'), array('controller'=>'tour_cost_types','action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
 
  				 $tableRows = [];
        		 $dataCount = (!empty($this->request->data('TourCost'))) ? count($this->request->data('TourCost')) : 0 ;
        		 $numRows = ($dataCount == 0) ? '1' : $dataCount;
        		 for($i=0; $i<$numRows; $i++) {
        		 	$tableRow = [];
        		 	$id = $this->request->data('TourCost.'.$i.'.id');
        		 	$tableRow[] = $this->Bs->input('TourCost.'.$i.'.id').$this->Bs->input('TourCost.'.$i.'.date',['type'=>'text','class'=>'date','label'=>false]).$this->Bs->input('TourCost.'.$i.'.id', ['type'=>'hidden']);
        		 	
        		 	

        		 	$tableRow[] = $this->Bs->input('TourCost.'.$i.'.no_of_seats',['type'=>'text','label'=>false,'placeholder'=>'No. Of Seats']);
       
        		 	$tableRow[] = $this->Bs->input('TourCost.'.$i.'.active',['type'=>'checkbox']).$this->Bs->input('TourCost.'.$i.'.our_journy_id',['type'=>'hidden','value'=>$journeyId]);
        		 	 if(!$id) {
	                      if($i > 1) {
	                          $tableRow[] = $this->Html->link($this->Bs->icon('times'), '#', array('class'=>'btn btn-danger btn-sm removeRow', 'data-toggle'=>"tooltip", 'title'=>"Remove Row"));
	                      } else {
	                          $tableRow[] = '';
	                      }
	                  } else {
	                      $tableRow[] = 
	                      		$this->Html->link($this->Bs->icon('search'), array('controller'=>'tour_costs', 'action'=>'view', $id), array('escape'=>false, 'class'=>'btn btn-warning linkrow btn-sm', 'title'=>__('View'), 'data-toggle'=>'modal-manager tooltip') ).
	                      		
	                      		$this->Html->link($this->Bs->icon('trash-o'), array('controller'=>'tour_costs', 'action'=>'delete', $id), array('escape'=>false, 'class'=>'btn btn-danger btn-sm', 'title'=>__('Delete'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$id) ).

	                      		$this->Html->link($this->Bs->icon('plus'), array('controller'=>'tour_cost_details', 'action'=>'add', $journeyId,$id), array('escape'=>false, 'class'=>'btn btn-info btn-sm', 'title'=>__('Add Cost Detail'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$id) )
	                      		;
	                  }
	                  $tableRows[] = $tableRow;
	                 
        		 }	
        		 echo $this->Html->tag('table',
	                  $this->Html->tag('thead',
	                      $this->Html->tableHeaders(array(
	                          [__('Date')=>['class'=>'col-md-2']],
	                          
	                          [__('No Of Seat')=>['class'=>'col-md-2']],        
	                          [__('Active')=>['class'=>'col-md-1']],
	                          [__('Action')=>['class'=>'col-md-1']], 
	                      ))
	                  ).
	                  $this->Html->tag('tbody',
	                      $this->Html->tableCells($tableRows)
	                  ).
	                  $this->Html->tag('tfoot',
	                      $this->Html->tableCells(array(array(
	                          array(
	                              $this->Html->link(__('Add More'), '#', array('type'=>'button', 'class'=>'btn btn-sm yellow pull-right', 'data-toggle'=>'add-more')),
	                              array('colspan'=>'6')
	                          )
	                      )))
	                  ),
	                  ['class'=>'table table-bordered table-condensed table-advance']
	              );

			?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm btn-info')),
				$this->Form->button('<i class="fa fa-refresh"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm btn-warning'))
			));
		?>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
$(function() {
<?php $this->start('appScript'); ?>	
<?php $this->end(); ?>
});
</script>