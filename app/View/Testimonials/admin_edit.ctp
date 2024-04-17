<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Testimonial'), array('controller'=>'testimonials', 'action'=>'admin_edit', $this->Form->value('Testimonial.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row testimonials form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Testimonial'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Testimonial.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Testimonial.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Testimonials'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Testimonial', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			$mainImgPath =  $this->webroot.'files/testimonial/image/'.$this->request->data['Testimonial']['id'].'/'.$this->request->data['Testimonial']['image']; 
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',	
					$this->html->div('row',
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
					$this->Bs->input('its_video_link', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline ItsVideoLink', 'options'=>['No', 'Yes'], 'default' => 0)).
				   $this->html->div('col-sm-6 VideoLink',
				   $this->Bs->input('video_link',['type'=>'text'])
				   ).
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['Testimonial']['image'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'imageBanner']).
								$this->Bs->input('Testimonial.image',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $mainImgPath.' id="blah" class="imageBanner">'.

							$this->Bs->input('Testimonial.image',['type'=>'file','id'=>'imgupload','label'=>false]).
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
							'</div></div>'
						)
					)
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

var videoLink = $('.ItsVideoLink:checked').val();
	if(videoLink == '1'){
		$('.VideoLink').show();
	}else{
		$('.VideoLink').hide();
	}

$('.ItsVideoLink').change(function(){
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