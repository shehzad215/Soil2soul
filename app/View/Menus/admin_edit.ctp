<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menus'), array('controller'=>'menus', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );	
	echo $this->end();
?>
<div class="row menus form">
<div class="col-md-12">
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Menus'); ?> <?php echo $this->Bs->loader(); ?>
        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = [];
			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Menu.id')), array('icon'=>'search', 'class'=>'btn btn-outline white btn-sm', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Menu.id')), array('icon'=>'trash-o', 'class'=>'btn btn-outline white btn-sm', 'data-toggle'=>'modal-manager'));
			endif;			
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-default btn-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>       
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Menu', array('class'=>'form-vertical'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('name',['col'=>'6']).
					$this->Bs->input('link',['col'=>'6'])
				)
			);
		?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm green')),
				$this->Bs->link('<i class="fa fa-refresh"></i> '.__('Cancel'), ['controller'=>'menus', 'action'=>'index', 'admin'=>true ], array('type'=>'button', 'class'=>'btn btn-sm yellow', 'escape'=>false ))
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
<script type="text/javascript">
    $(document).ready(function() {
        $(":input").bind("keyup change", function(e) {
           if ($(this).val()[0] === " ") {
            var inputValue = $(this).val();
            var trimmedInputValue= $.trim(inputValue);
            $(this).val(trimmedInputValue);
            }
        });
        $(":input").blur(function(){
            var inputValue = $(this).val();
            var trimmedInputValue= $.trim(inputValue);
            $(this).val(trimmedInputValue);
        });
    });
</script>