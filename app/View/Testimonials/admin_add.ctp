<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Testimonial'), array('controller'=>'testimonials', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row testimonials form">
<div class="col-md-12">	
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Testimonial'); ?> <?php echo $this->Bs->loader(); ?> </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			/*$dropdownMenuLink[] = $this->Bs->link(__('Testimonials'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Testimonial', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',	
					$this->html->div('row',
					$this->Bs->input('our_journy_id',['type'=>'hidden','col'=>'4','value'=>$journeyId]).	
					$this->Bs->input('name',['type'=>'text','col'=>'4']).
					$this->Bs->input('email',['type'=>'email','col'=>'4']).
					$this->Bs->input('mobile',['type'=>'text','col'=>'4','class'=>'numeric'])
				)
			);

			echo $this->html->div('tab-box',	
					$this->html->div('row',
					$this->Bs->input('country',['type'=>'text','col'=>'4']).
					 $this->Bs->input('active', array('type'=>'radio','col'=>'4', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
					 $this->Bs->input('is_display_homepage', array('type'=>'radio','col'=>'4', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))
				)
			);

			echo $this->html->div('tab-box',	
					$this->html->div('row',
					$this->Bs->input('msg',['col'=>'12','rows'=>'3','label'=>'Message'])
				   )
				);
			
			echo $this->html->div('tab-box',
				$this->html->div('row',
			   $this->Bs->input('its_video_link', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline videoLink', 'options'=>['No', 'Yes'], 'default' => 0)).
			   $this->html->div('col-sm-6 VideoLink',
			   $this->Bs->input('video_link',['type'=>'text'])
			   ).			
		       $this->Bs->input('Testimonial.image', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'200', 'height'=>'70'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))			
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

$('.VideoLink').hide();

$('.videoLink').change(function(){
	var videoLink = $(this).val();
	if(videoLink == '1'){
		$('.VideoLink').show();
	}else{
		$('.VideoLink').hide();
	}
});

<?php $this->end(); ?>
});
</script>