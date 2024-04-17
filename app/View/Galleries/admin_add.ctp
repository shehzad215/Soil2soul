<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Galleries'), array('controller'=>'galleries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Gallery'), array('controller'=>'galleries', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row galleries form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Gallery'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Gallery', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('order',['type'=>'text','col'=>'2','class'=>'numeric']).
					$this->Bs->input('name',['col'=>'4']).
				    $this->Bs->input('gallery_category_id', array('empty'=>'Select', 'class'=>'addNewGalleryCategoryId','col'=>'4')).
				    $this->Bs->input('active', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))	    
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('Gallery.image', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))	
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

	// var uniqueRule = {
    //     url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
    //     type: "post"
    // };
    
    // $('[id*="GalleryOrder"').rules( "add", {
    //     remote: uniqueRule,        
    //     messages: {
    //         remote: '<?php echo __('This OrderCode is already present.'); ?>'
    //     }
    // });

<?php $this->end(); ?>
});
</script>