<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Seo Modules'), array('controller'=>'seo_modules', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Seo Module'), array('controller'=>'seo_modules', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row seoModules form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Seo Module'); ?> <?php echo $this->Bs->loader(); ?>        
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('SeoModule', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('page_name',['col'=>'4','label'=>'Page Name']).
					$this->Bs->input('page_title',['col'=>'4','label'=>'Page Title']).
					$this->Bs->input('link',['col'=>'4','class'=>'urlinput', 'append'=>array('icon-button'=>'link')])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('controller',['col'=>'4','class'=>'urlinput','readonly'=>true]).
					$this->Bs->input('action',['col'=>'4','class'=>'urlinput','readonly'=>true]).
					$this->Bs->input('page_url',['col'=>'4','class'=>'urlinput'])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('meta_keyword',['col'=>'6','rows'=>'3','class'=>'']).	
					$this->Bs->input('meta_description',['col'=>'6','rows'=>'3','class'=>''])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('SeoModule.meta_image', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')])).	
					$this->Bs->input('active', array('col'=>'4','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))	
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
		

		if($('input#SeoModuleController').val() == '') {
			$('input#SeoModuleController').val(controller)
		}

		if($('input#SeoModuleAction').val() == '') {
			$('input#SeoModuleAction').val(action)
		}
		
		$('input#SeoModuleLink').val('{"controller":"'+controller+'", "action":"'+action+'"}')
	})
<?php $this->end(); ?>
});
</script>