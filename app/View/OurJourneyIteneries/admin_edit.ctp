<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Iteneries'), array('controller'=>'our_journey_iteneries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Our Journey Itenery'), array('controller'=>'our_journey_iteneries', 'action'=>'admin_edit', $this->Form->value('OurJourneyItenery.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourJourneyIteneries form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Our Journey Itinerary'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('OurJourneyItenery.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('OurJourneyItenery.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Our Journey Iteneries'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourneyItenery', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
				    $this->Bs->input('our_journy_id', array('empty'=>'Select','col'=>'6','class'=>'addNewOurJournyId','label'=>'Our Journey')).
				    $this->Bs->input('active', array('type'=>'radio','col'=>'6', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))
			
					)
				);

			echo $this->html->div('tab-box',
				$this->html->div('row',
				    $this->Bs->input('day', array('type'=>'text','col'=>'6')).
				    $this->Bs->input('title', array('type'=>'text','col'=>'6'))
				)
			);	

			echo $this->html->div('tab-box',
				$this->html->div('row',
				    $this->Bs->input('description', array('type'=>'text','col'=>'12','rows'=>'2','class'=>'rich-editor'))
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