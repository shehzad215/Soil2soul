<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Tour Cost Details'), array('controller'=>'tour_cost_details', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Tour Cost Detail'), array('controller'=>'tour_cost_details', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row tourCostDetails form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Tour Cost Detail For Tour ('.$ourJourney[$journeyId].' - '.date_format(date_create($tourCost[$costTypeId]),'jS M Y').')'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('TourCost', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
 
  				 $tableRows = [];
        		 $dataCount = (!empty($this->request->data('TourCostDetail'))) ? count($this->request->data('TourCostDetail')) : 0 ;

        		 // debug($dataCount);exit;

        		 $numRows = ($dataCount == 0) ? '1' : $dataCount;
        		 for($i=0; $i<$numRows; $i++) {
        		 	$tableRow = [];
        		 	$id = $this->request->data('TourCostDetail.'.$i.'.id');
        		 	$tableRow[] = $this->Bs->input('TourCostDetail.'.$i.'.id').$this->Bs->input('TourCostDetail.'.$i.'.tour_cost_type_id',['type'=>'select','class'=>'','empty'=>'Select','label'=>false,'options'=>$tourCostTypes]).$this->Bs->input('TourCostDetail.'.$i.'.id', ['type'=>'hidden']);
        		 	
        		 	
        		 	$tableRow[] = $this->Bs->input('TourCostDetail.'.$i.'.currency_id',['type'=>'select','class'=>'','empty'=>'Select','label'=>false,'options'=>$currencies]).$this->Bs->input('TourCostDetail.'.$i.'.price',['type'=>'number','label'=>false,'placeholder'=>'Price']);

      
        		 	$tableRow[] = $this->Bs->input('TourCostDetail.'.$i.'.active',['type'=>'checkbox']).$this->Bs->input('TourCostDetail.'.$i.'.our_journy_id',['type'=>'hidden','value'=>$journeyId]).$this->Bs->input('TourCostDetail.'.$i.'.tour_cost_id',['type'=>'hidden','value'=>$costTypeId]);
        		 	 if(!$id) {
	                      if($i > 1) {
	                          $tableRow[] = $this->Html->link($this->Bs->icon('times'), '#', array('class'=>'btn btn-danger btn-sm removeRow', 'data-toggle'=>"tooltip", 'title'=>"Remove Row"));
	                      } else {
	                          $tableRow[] = '';
	                      }
	                  } else {
	                      $tableRow[] = 
	                      		$this->Html->link($this->Bs->icon('search'), array('controller'=>'tour_cost_details', 'action'=>'view', $id), array('escape'=>false, 'class'=>'btn btn-warning linkrow btn-sm', 'title'=>__('View Image'), 'data-toggle'=>'modal-manager tooltip') ).
	                      		$this->Html->link($this->Bs->icon('trash-o'), array('controller'=>'tour_cost_details', 'action'=>'delete', $id), array('escape'=>false, 'class'=>'btn btn-danger btn-sm', 'title'=>__('Delete'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$id) );
	                  }
	                  $tableRows[] = $tableRow;
	                 
        		 }	
        		 echo $this->Html->tag('table',
	                  $this->Html->tag('thead',
	                      $this->Html->tableHeaders(array(
	                          [__('Tour Cost Type')=>['class'=>'col-md-2']],
	                          [__('Price')=>['class'=>'col-md-2']],        
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