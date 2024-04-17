<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Exlusions'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Our Journey Exlusion'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();

	// debug($this->request->data);exit;
?>
<div class="row ourJourneyExlusions form">
<div class="col-md-12">
	<h4><?php  echo 'Tour :- '.$this->request->data['OurJourny']['name'];?></h4>	
<!-- Our Journey navigation -->
<nav class="navbar navbar-default listingBar">
	<ul class="nav navbar-nav" role="tablist">
		<?php echo $this->Bs->menuLink(__('Our Journey'), ['controller'=>'our_journies','action'=>'edit',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Tour Glimpse'),['controller'=>'tour_glimpses','action'=>'index','TourGlimpse.our_journy_id'=>$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Exclusions'),'#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']) ?>
		<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Itineraries'), array('controller'=>'our_journey_iteneries', 'action'=>'add',$journeyId)) ?>
   <?php echo $this->Bs->menuLink(__('Tour Cost'), array('controller'=>'tour_costs', 'action'=>'add',$journeyId)) ?>
   <?php echo $this->Bs->menuLink(__('Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$journeyId)) ?>
    <?php echo $this->Bs->menuLink(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'add',$journeyId)) ?>
	</ul>
</nav>		
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Our Journey Exlusion'); ?> <?php echo $this->Bs->loader(); ?>       
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			// echo $this->Bs->input('our_journy_id', array('empty'=>'Select', 'class'=>'addNewOurJournyId', 'append'=>array('button'=>'Add New')));
			// echo $this->Bs->input('note');
			// echo $this->Bs->input('active');
		?>
		<?php
			 $tableRows = [];
        	 $dataCount = (!empty($this->request->data('OurJourneyExlusion'))) ? count($this->request->data('OurJourneyExlusion')) : 0 ;

        	 // debug($dataCount);exit;

    		 $numRows = ($dataCount == 0) ? '1' : $dataCount;
    		 for($i=0; $i<$numRows; $i++) {
    		 	$tableRow = [];
    		 	$id = $this->request->data('OurJourneyExlusion.'.$i.'.id');
    		 	$tableRow[] = $this->Bs->input('OurJourneyExlusion.'.$i.'.id').$this->Bs->input('OurJourneyExlusion.'.$i.'.note',['label'=>false]).$this->Bs->input('OurJourneyExlusion.'.$i.'.id', ['type'=>'hidden']).$this->Bs->input('OurJourneyExlusion.'.$i.'.our_journy_id',['type'=>'hidden','value'=>$journeyId]); 
    		 	$tableRow[] = $this->Bs->input('OurJourneyExlusion.'.$i.'.active',['type'=>'checkbox',]);
    		 	 if(!$id) {
                      if($i > 1) {
                          $tableRow[] = $this->Html->link($this->Bs->icon('times'), '#', array('class'=>'btn btn-danger btn-sm removeRow', 'data-toggle'=>"tooltip", 'title'=>"Remove Row"));
                      } else {
                          $tableRow[] = '';
                      }
                  } else {
                      $tableRow[] = $this->Html->link($this->Bs->icon('search'), array('controller'=>'our_journey_exlusions', 'action'=>'view', $id), array('escape'=>false, 'class'=>'btn btn-warning linkrow btn-sm', 'title'=>__('View Image'), 'data-toggle'=>'modal-manager tooltip') ).$this->Html->link($this->Bs->icon('trash-o'), array('controller'=>'our_journey_exlusions', 'action'=>'delete', $id), array('escape'=>false, 'class'=>'btn btn-danger btn-sm', 'title'=>__('Delete'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$id) );
                  }
                  $tableRows[] = $tableRow;
    		 }	
    		 echo $this->Html->tag('table',
                  $this->Html->tag('thead',
                      $this->Html->tableHeaders(array(
                          [__('Note')=>['class'=>'col-md-6']],  
                          [__('Active')=>['class'=>'col-md-4']], 
                          [__('Action')=>['class'=>'col-md-2']], 
                      ))
                  ).
                  $this->Html->tag('tbody',
                      $this->Html->tableCells($tableRows)
                  ).
                  $this->Html->tag('tfoot',
                      $this->Html->tableCells(array(array(
                          array(
                              $this->Html->link(__('Add More'), '#', array('type'=>'button', 'class'=>'btn btn-sm yellow pull-right', 'data-toggle'=>'add-more')),
                              array('colspan'=>'4')
                          )
                      )))
                  ),
                  ['class'=>'table table-bordered table-condensed table-advance']
              );
		?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm btn-warning')),
				$this->Form->button('<i class="fa fa-refresh"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm btn-info'))
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