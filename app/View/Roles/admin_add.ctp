<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Roles'), array('controller'=>'roles', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Role'), array('controller'=>'roles', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row roles form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Role'); ?> <?php echo $this->Bs->loader(); ?>        
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Role', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('name',['col'=>'4']).
					$this->Bs->input('description',['col'=>'12','rows'=>'3'])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('full_view', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0)).
					$this->Bs->input('full_add', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0)).
					$this->Bs->input('full_edit', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0)).
					$this->Bs->input('full_delete', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('MenuLink',['col'=>'12'])
				)
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