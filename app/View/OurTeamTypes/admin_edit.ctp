<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Team Types'), array('controller'=>'our_team_types', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Our Team Type'), array('controller'=>'our_team_types', 'action'=>'admin_edit', $this->Form->value('OurTeamType.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourTeamTypes form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Our Team Type'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('OurTeamType.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('OurTeamType.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Our Team Types'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurTeamType', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('name',['col'=>'6']).
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