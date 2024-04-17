<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links Users'), array('controller'=>'menu_links_users', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Menu Links User'), array('controller'=>'menu_links_users', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row menuLinksUsers form">
<div class="col-md-12">
<div class="portlet box blue-hoki">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Menu Links User'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Users'), array('controller'=>'users', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			$dropdownMenuLink[] = $this->Bs->link(__('Menu Links Users'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn default btn-sm', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-default btn-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
        <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
            <a href="" class="reload" data-original-title="" title="" data-url="<?=$this->Html->url(array('controller'=>'menu_links_users', 'action'=>'admin_add'))?>"> </a>
        </div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('MenuLinksUser', array('class'=>'form-vertical'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('menu_link_id', array('empty'=>'Select', 'class'=>'addNewMenuLinkId', 'append'=>array('button'=>'Add New')));
			// Has user_id
		?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-primary')),
				$this->Bs->link('<i class="fa fa-refresh"></i> '.__('Cancel'), ['controller'=>'menu_links_users', 'action'=>'index', 'admin'=>true ], array('type'=>'button', 'class'=>'btn btn-primary', 'escape'=>false ))
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