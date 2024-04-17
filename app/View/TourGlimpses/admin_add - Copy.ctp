<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Tour Glimpses'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Add Tour Glimpse'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row tourGlimpses form">
<div class="col-md-12">
<!-- Our Journey navigation -->
	<nav class="navbar navbar-default listingBar">
		<ul class="nav navbar-nav" role="tablist">
			<?php echo $this->Bs->menuLink(__('Our Journey'), array('controller'=>'our_journies', 'action'=>'edit',$journeyId)); ?>
			<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$journeyId]); ?>
			<?php echo $this->Bs->menuLink(__('Tour Glimpse'), '#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']); ?>
			<?php echo $this->Bs->menuLink(__('Exlusions'), array('controller'=>'our_journey_exlusions', 'action'=>'add',$journeyId)) ?>
			<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$journeyId)) ?>
			<?php echo $this->Bs->menuLink(__('Iteneries'), array('controller'=>'our_journey_iteneries', 'action'=>'add',$journeyId)) ?>
			<?php echo $this->Bs->menuLink(__('Departures'), array('controller'=>'our_journey_departures', 'action'=>'add',$journeyId)) ?>
			<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$journeyId)) ?>
		</ul>
	</nav>		
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Tour Glimpse'); ?> <?php echo $this->Bs->loader(); ?>        
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
 
  		 $tableRows = [];
        		 $dataCount = (!empty($this->request->data('TourGlimpse'))) ? count($this->request->data('TourGlimpse')) : 0 ;
        		 $numRows = ($dataCount == 0) ? '1' : $dataCount;
        		 for($i=0; $i<$numRows; $i++) {
        		 	$tableRow = [];
        		 	$id = $this->request->data('TourGlimpse.'.$i.'.id');
        		 	$tableRow[] = $this->Bs->input('TourGlimpse.'.$i.'.id').$this->Bs->input('TourGlimpse.'.$i.'.amenity_id',['type'=>'select','class'=>'','empty'=>'Select','label'=>false,'options'=>$amenities]).$this->Bs->input('TourGlimpse.'.$i.'.id', ['type'=>'hidden']);
        		 	
        		 	$tableRow[] = $this->Bs->input('TourGlimpse.'.$i.'.description',['type'=>'text','label'=>false,'rows'=>'2','class'=>'rich-editor-min-toolbar']);
       
        		 	$tableRow[] = $this->Bs->input('TourGlimpse.'.$i.'.active',['type'=>'checkbox',]);
        		 	 if(!$id) {
	                      if($i > 1) {
	                          $tableRow[] = $this->Html->link($this->Bs->icon('times'), '#', array('class'=>'btn btn-danger btn-sm removeRow', 'data-toggle'=>"tooltip", 'title'=>"Remove Row"));
	                      } else {
	                          $tableRow[] = '';
	                      }
	                  } else {
	                      $tableRow[] = $this->Html->link($this->Bs->icon('edit'), array('controller'=>'tour_glimpses', 'action'=>'edit', $id), array('escape'=>false, 'class'=>'btn btn-warning btn-sm', 'title'=>__('Update'), 'data-toggle'=>' tooltip', 'data-delete-row-id'=>$id) ).$this->Html->link($this->Bs->icon('search'), array('controller'=>'tour_glimpses', 'action'=>'view', $id), array('escape'=>false, 'class'=>'btn btn-info btn-sm', 'title'=>__('View Details'), 'data-toggle'=>'modal-manager tooltip') );
	                  }
	                  $tableRows[] = $tableRow;
	                 
        		 }	
        		 echo $this->Html->tag('table',
	                  $this->Html->tag('thead',
	                      $this->Html->tableHeaders(array(
	                          [__('Amenity')=>['class'=>'col-md-1']],
	                          [__('Description')=>['class'=>'col-md-3']],        
	                          [__('Active')=>['class'=>'col-md-2']],
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