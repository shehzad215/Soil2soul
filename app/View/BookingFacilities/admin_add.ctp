<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Booking Facilities'), array('controller'=>'booking_facilities', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Booking Facility'), array('controller'=>'booking_facilities', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row bookingFacilities form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Booking Facility'); ?> <?php echo $this->Bs->loader(); ?>       
        </div>
		
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BookingFacility', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
		 	echo $this->html->div('tab-box',
		 		$this->html->div('row',
		 			$this->Bs->input('name',['col'=>'4']).
		 			$this->Bs->input('class',['col'=>'4']).
		 			$this->Bs->input('active', array('col'=>'4','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
		 		)
		 	);
		 	echo $this->html->div('tab-box',
		        $this->html->div('row',
		            $this->Bs->input('BookingFacility.image_file', array('label' => __('Upload Icon'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))  
		        )
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