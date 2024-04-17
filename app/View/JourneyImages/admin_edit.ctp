<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Journey Images'), array('controller'=>'journey_images', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Journey Image'), array('controller'=>'journey_images', 'action'=>'admin_edit', $this->Form->value('JourneyImage.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row journeyImages form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Journey Image'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('JourneyImage.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('JourneyImage.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('JourneyImage', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php 

		$mainImgPath =  $this->webroot.'files/journey_image/image_file/'.$this->request->data['JourneyImage']['id'].'/'.$this->request->data['JourneyImage']['image_file'];

			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('our_journy_id', array('empty'=>'Select', 'class'=>'addNewOurJournyId','col'=>'3','label'=>'Journey Images')).
					$this->Bs->input('order',['col'=>'3']).
					$this->Bs->input('name',['col'=>'3']).
					$this->Bs->input('active', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
				)
			);
			echo $this->html->div('tab-box',
		        $this->html->div('row',
		            $this->html->div('col-sm-4',
						$this->html->div('passportphoto',
							(empty($this->request->data['JourneyImage']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'imageBanner']).
								$this->Bs->input('JourneyImage.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $mainImgPath.' id="blah" class="imageBanner">'.

							$this->Bs->input('JourneyImage.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
							'</div></div>'
						)
					).
		            $this->Bs->input('its_main_image', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0)) 
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