<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Iteneries'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Our Journey Itenery'), array('controller'=>'our_journey_iteneries', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourJourneyIteneries form">
<div class="col-md-12">
<h4><?php  echo 'Tour :- '.$this->request->data['OurJourny']['name'];?></h4>
<nav class="navbar navbar-default listingBar">
	<ul class="nav navbar-nav" role="tablist">
		<?php echo $this->Bs->menuLink(__('Our Journey'), ['controller'=>'our_journies','action'=>'edit',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Tour Glimpse'),['controller'=>'tour_glimpses','action'=>'index','TourGlimpse.our_journy_id'=>$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Exclusions'),['controller'=>'our_journey_exlusions','action'=>'add',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Itineraries'),'#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']) ?>
		 <?php echo $this->Bs->menuLink(__('Tour Cost'), array('controller'=>'tour_costs', 'action'=>'add',$journeyId)) ?>
         <?php echo $this->Bs->menuLink(__('Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$journeyId)) ?>
         <?php echo $this->Bs->menuLink(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'add',$journeyId)) ?>
	</ul>
</nav>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Our Journey Itinerary'); ?> <?php echo $this->Bs->loader(); ?></div>
		
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
        <table class="table table-bordered table-condensed table-advance">
        	<thead>
        		<tr>
        			<th class="col-sm-1">Day</th>
        			<th class="">Title</th>
                    <!-- <th class="">Latitude</th>
                    <th class="">Longitude</th> -->
        			<th class="col-sm-6">Description</th>
        			<th class=" text-center">Active</th>
        			<th class="">Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        			//debug($this->request->data);exit;	
        			for ($i=0; $i < $countnights; $i++) {

        			 $id = (isset($this->request->data['OurJourneyItenery'][$i]['id'])) ? $this->request->data['OurJourneyItenery'][$i]['id'] : '';

        			?>	
        			<tr>
        				<td>
        					<?php echo $this->Bs->input('OurJourneyItenery.'.$i.'.id').$this->Bs->input('OurJourneyItenery.'.$i.'.day',['class'=>'numeric','label'=>false]).$this->Bs->input('OurJourneyItenery.'.$i.'.id', ['type'=>'hidden']).$this->Bs->input('OurJourneyItenery.'.$i.'.our_journy_id',['type'=>'hidden','value'=>$journeyId]);  ?>
        				</td>
        				<td>
        					<?php echo  $this->Bs->input('OurJourneyItenery.'.$i.'.title',['type'=>'text','label'=>false]);
        					 ?>
        				</td>
 <!--                        <td>
                            <?php //echo  $this->Bs->input('OurJourneyItenery.'.$i.'.latitude',['type'=>'text','label'=>false]);
                             ?>
                        </td> -->
<!--                         <td>
                            <?php //echo  $this->Bs->input('OurJourneyItenery.'.$i.'.longitude',['type'=>'text','label'=>false]);
                             ?>
                        </td> -->
        				<td>
        					<?php echo $this->Bs->input('OurJourneyItenery.'.$i.'.description',['type'=>'text','rows'=>'2','label'=>false,'class'=>'rich-editor']); ?>
        				</td>
        				<td class="text-center">
        				<?php echo $this->Bs->input('OurJourneyItenery.'.$i.'.active',['type'=>'checkbox','label'=>false]); ?>
        				</td>
        			
        				<td>
        					<?php 
	        					if(!empty($id)){
	        						echo $this->Html->link($this->Bs->icon('search'), array('controller'=>'our_journey_iteneries', 'action'=>'view', $id), array('escape'=>false, 'class'=>'btn btn-warning linkrow btn-sm', 'title'=>__('View Image'), 'data-toggle'=>'modal-manager tooltip') ).
	        						$this->Html->link($this->Bs->icon('trash-o'), array('controller'=>'our_journey_iteneries', 'action'=>'delete', $id), array('escape'=>false, 'class'=>'btn btn-danger btn-sm', 'title'=>__('Delete'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$id) );
	        					}
        					?>
        				</td>	
        			</tr>
        		<?php } ?>
        	</tbody>
        </table>	
		
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