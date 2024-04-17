<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Faq Types'), array('controller'=>'faq_types', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Faq Type'), array('controller'=>'faq_types', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row faqTypes form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Faq Type'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">

		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('FaqType', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',
				$this->html->div('row',
					 $this->Bs->input('name', array('type'=>'text','col'=>'6')).
					 $this->Bs->input('active', array('type'=>'radio','col'=>'6', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))
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