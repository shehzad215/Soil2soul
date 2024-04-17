<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Booking Facilities'), array('controller'=>'booking_facilities', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Booking Facility'), array('controller'=>'booking_facilities', 'action'=>'admin_edit', $this->Form->value('BookingFacility.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row bookingFacilities form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Booking Facility'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('BookingFacility.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('BookingFacility.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
		
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BookingFacility', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			$imagePath = $this->webroot.'files/booking_facility/image_file/'.$this->request->data['BookingFacility']['id'].'/'.$this->request->data['BookingFacility']['image_file'];
			echo $this->Bs->input('id');
		 	echo $this->html->div('tab-box',
		 		$this->html->div('row',
		 			$this->Bs->input('name',['col'=>'4']).
		 			$this->Bs->input('class',['col'=>'4']).
		 			$this->Bs->input('active', array('col'=>'4','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
		 		)
		 	);
		 	// echo $this->html->div('tab-box',
		    //     $this->html->div('row',
		    //         $this->Bs->input('BookingFacility.image_file', array('label' => __('Upload Icon'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))  
		    //     )
		    // );
		    echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['BookingFacility']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedIconFile']).
								$this->Bs->input('BookingFacility.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $imagePath.' id="blah" class="uplodedIconFile">'.

							$this->Bs->input('BookingFacility.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
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
<?php $this->end(); ?>
});
</script>