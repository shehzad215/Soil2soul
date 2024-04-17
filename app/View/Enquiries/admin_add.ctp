<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Enquiries'), array('controller'=>'enquiries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Enquiry'), array('controller'=>'enquiries', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row enquiries form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Enquiry'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Tour Costs'), array('controller'=>'tour_costs', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Currencies'), array('controller'=>'currencies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			$dropdownMenuLink[] = $this->Bs->link(__('Enquiries'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Enquiry', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('our_journy_id', array('empty'=>'Select', 'class'=>'addNewOurJournyId', 'append'=>array('button'=>'Add New')));
			echo $this->Bs->input('tour_cost_id', array('empty'=>'Select', 'class'=>'addNewTourCostId', 'append'=>array('button'=>'Add New')));
			echo $this->Bs->input('currency_id', array('empty'=>'Select', 'class'=>'addNewCurrencyId', 'append'=>array('button'=>'Add New')));
			echo $this->Bs->input('journey_date', array('type'=>'text', 'class'=>'date', 'data-min-date'=>'', 'data-max-date'=>'', 'placeholder'=>'YYYY-MM-DD', 'append'=>array('icon'=>'calendar')));
			echo $this->Bs->input('no_of_adults');
			echo $this->Bs->input('no_of_child');
			echo $this->Bs->input('total_cost');
			echo $this->Bs->input('cust_name');
			echo $this->Bs->input('cust_email');
			echo $this->Bs->input('contact_no');
			echo $this->Bs->input('nationality');
			echo $this->Bs->input('message');
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