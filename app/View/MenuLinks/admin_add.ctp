<style type="text/css">
	.FrontendFieldBox, .FrontendField, .FileType, .OuterURL{
		display: none;
	}
</style>
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );	
	echo $this->end();
?>
<div class="row menuLinks form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Menu Links'); ?> <?php echo $this->Bs->loader(); ?>
        </div>
		<div class="actions"></div>        
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('MenuLink', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Html->div('tab-box',
				$this->Html->div('row',
					$this->Bs->input('menu_id', array(
						'col'=>'6', 'empty'=>'Select', 'class'=>'addNewMenuId', 'append'=>array('button'=>'Add New'),
						'data-toggle'=>'dropdown-update', 'data-target'=>'select[id*="ParentId"]', 'data-rootNode'=>'menuLinks',
						'data-url'=>$this->Html->url(array('controller'=>'menu_links', 'action'=>'lists', 'admin'=>true, 'menu_id'=>'datavalue', 'ext'=>'json'))
					)).
					$this->Bs->input('parent_id', array('col'=>'6', 'empty'=>'Root', 'options'=>array(),'class'=>'addNewParentId', 'append'=>array('button'=>'Add New')))
				)	
			);
			echo $this->Html->div('tab-box', 
			$this->Html->div('row',
				$this->Bs->input('icon', array('col'=>'2')).
				$this->Bs->input('title', array('col'=>'5')).
				$this->Bs->input('link', array('col'=>'5', 'append'=>array('icon-button'=>'link')))
			));
			echo $this->Html->div('tab-box', 
			$this->Html->div('row',	
				$this->Bs->input('attributes',['col'=>4]).
				$this->Bs->input('Role',['col'=>4]).	
				$this->Bs->input('User',['col'=>4])
			));
			echo $this->Html->div('tab-box', 
				$this->Html->div('row',	
				$this->Bs->input('active', array('type'=>'radio','col'=>'4','class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
				$this->Html->div('FrontendFieldBox',
				$this->Bs->input('is_file', array('type'=>'radio','col'=>'4','class'=>'radio-inline isFile', 'options'=>['No', 'Yes'], 'default' => 0)).
				$this->Bs->input('is_outer_link', array('type'=>'radio','col'=>'4','class'=>'radio-inline outUrlLink', 'options'=>['No', 'Yes'],'label'=>'External Link','default' => 0))
				)
			));
			echo $this->Html->div('tab-box FrontendField', 
				$this->Html->div('row',
					$this->html->div('col-sm-4 FileType',
						$this->Bs->input('MenuLink.file',['type'=>'file'])
					).
					'</div></div>'.
					$this->html->div('col-sm-4 OuterURL',
						$this->Bs->input('outer_link',['type'=>'text'])
					)
				)
			); 
		?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm yellow')),
				$this->Bs->link('<i class="fa fa-refresh"></i> '.__('Cancel'), ['controller'=>'menu_links', 'action'=>'index', 'admin'=>true ], array('type'=>'button', 'class'=>'btn btn-sm green', 'escape'=>false ))
	
			));
		?>
	</div>
</div>
</div>
</div>

<?php $this->start('additionalModal'); ?>
	<div class="modal fade no-modal-manager" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4Label" aria-hidden="true">
		<div class="modal-dialog modal-wide">
			<div class="modal-content">
				<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div><div class="modal-body">
				<?php echo $this->Bs->create('MenuLink', array('action'=>'#', 'class'=>'form-vertical'));?>
				<?php
					echo $this->Html->div('row',
						$this->Bs->input('controller', array('col'=>'6', 'type'=>'select', 'empty'=>'Select', 
							'data-toggle'=>'dropdown-update', 'data-target'=>'select[id*="Action"]', 'data-rootNode'=>'actions', 
							'data-url'=>$this->Html->url(array('controller'=>'menu_links', 'action'=>'get_controller_actions', 'datavalue', 'ext'=>'json'))
						)).
						$this->Bs->input('action', array('col'=>'6', 'type'=>'select', 'empty'=>'Select'))
					);
				?>
				</div>
			</div>
		</div>
	</div>
<?php $this->end(); ?>

<script type="text/javascript">
$(function() {
<?php $this->start('appScript'); ?>
	$('.linkIconBtn').on('click', function(){
		$('#myModal4').modal('show');
	})
	
	core.updateDropDown('select[id*="Controller"]', '<?php echo $this->Html->url(array('controller'=>'menu_links', 'action'=>'get_controllers', 'ext'=>'json')); ?>', 'controllers')
	
	$('select[id*="Controller"], select[id*="Action"]').on('change', function() {
		var controller = $('select[id*="Controller"]').select2('val')
		var action = $('select[id*="Action"]').select2('val')
		
		if($('input#MenuLinkTitle').val() == '') {
			$('input#MenuLinkTitle').val($('select[id*="Controller"]').select2('data').text)
		}
		
		$('input#MenuLinkLink').val('{"controller":"'+controller+'", "action":"'+action+'"}')
	});

	$('#MenuLinkMenuId').change(function(){
		var menuId =  $(this).val();
		if(menuId == '2'){
			$('.FrontendFieldBox').show();
		}else{
			$('.FrontendFieldBox').hide();
		}
	});

	$('.isFile').change(function(){
		var IsFileVal = $(this).val();
		if(IsFileVal == '1'){
			$('.FrontendField').show();
			$('.FileType').show();
		}else{
			$('.FileType').hide();
		}
	});

	$('.outUrlLink').change(function(){
		var IsFileVal = $(this).val();
		if(IsFileVal == '1'){
			$('.FrontendField').show();
			$('.OuterURL').show();
		}else{
			$('.OuterURL').hide();
		}
	});




<?php $this->end(); ?>
});
</script>