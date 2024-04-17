<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Our Journey Hotel'), array('controller'=>'our_journey_hotels', 'action'=>'admin_edit', $this->Form->value('OurJourneyHotel.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourJourneyHotels form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Our Journey Hotel'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('OurJourneyHotel.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('OurJourneyHotel.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Our Journey Hotels'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourneyHotel', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
		$mainImgPath =  $this->webroot.'files/our_journey_hotel/image_file/'.$this->request->data['OurJourneyHotel']['id'].'/'.$this->request->data['OurJourneyHotel']['image_file'];
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
					$this->html->div('row',
					$this->Bs->input('our_journy_id', array('empty'=>'Select','col'=>'4' ,'class'=>'addNewOurJournyId', 'append'=>array('button'=>'Add New'))).
					$this->Bs->input('hotel_name',['col'=>'4','type'=>'text']).
					$this->Bs->input('city_name',['col'=>'4','type'=>'text'])
					)
			);	

			echo $this->html->div('tab-box',
					$this->html->div('row',	
					$this->html->div('col-sm-4',
						$this->html->div('passportphoto',
							(empty($this->request->data['OurJourneyHotel']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'imageBanner']).
								$this->Bs->input('OurJourneyHotel.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $mainImgPath.' id="blah" class="imageBanner">'.

							$this->Bs->input('OurJourneyHotel.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
							'</div></div>'
						)
					).	
					$this->Bs->input('rating',['col'=>'4']).
					$this->Bs->input('active', array('type'=>'radio','col'=>'4', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))
					
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