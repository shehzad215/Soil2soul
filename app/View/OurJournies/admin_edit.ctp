<?php 
	$firstUrl = (!empty($package_id)) ? $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index','OurJourny.package_id'=>$package_id), array('rel'=>'v:url', 'property'=>'v:title')) : $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title'));
	echo $this->start('breadcrumb');
		echo $this->Html->tag('li', $firstUrl, array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Our Journy'), array('controller'=>'our_journies', 'action'=>'admin_edit', $this->Form->value('OurJourny.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourJournies form">
<div class="col-md-12">
	<h4><?php  echo 'Tour :- '.$this->request->data['OurJourny']['name'];?></h4>
	<!-- Our Journey navigation -->
	<nav class="navbar navbar-default listingBar">
		<ul class="nav navbar-nav" role="tablist">
			<?php echo $this->Bs->menuLink(__('Our Journey'), '#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']); ?>
			<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$id]); ?>
			<?php echo $this->Bs->menuLink(__('Tour Glimpse'),['controller'=>'tour_glimpses','action'=>'index','TourGlimpse.our_journy_id'=>$id]); ?>
			<?php echo $this->Bs->menuLink(__('Exclusions'), array('controller'=>'our_journey_exlusions', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Itineraries'), array('controller'=>'our_journey_iteneries', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Tour Cost'), array('controller'=>'tour_costs', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$id)) ?>
			<?php echo $this->Bs->menuLink(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'add',$id)) ?>
		</ul>
	</nav>	
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Our Journey'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('OurJourny.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('OurJourny.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php

			$mainImgPath =  $this->webroot.'files/our_journy/journey_banner/'.$this->request->data['OurJourny']['id'].'/'.$this->request->data['OurJourny']['journey_banner'];

			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('package_id', array('empty'=>'Select', 'class'=>'addNewPackageId','col'=>'3')).
					$this->Bs->input('currency_id', array('empty'=>'Select', 'class'=>'addNewCurrencyId','col'=>'2','default'=>'67')).
					$this->Bs->input('order',['type'=>'text','col'=>'2','class'=>'numeric']).
					$this->Bs->input('trail',['col'=>'2','placeholder'=>'Trail No.']).
					$this->Bs->input('no_of_nights',['col'=>'3','class'=>'numeric','placeholder'=>'No. Of Days','label'=>'No. Of Days']).
					 //$this->Bs->input('cost',['col'=>'2','class'=>'numeric','placeholder'=>'Cost']).
					$this->Bs->input('name',['col'=>'12','placeholder'=>'Name'])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('page_slug',['col'=>'3','placeholder'=>'Page Slug']).
					$this->Bs->input('page_title',['col'=>'3','placeholder'=>'Page Title']).
					// $this->Bs->input('Amenity',['col'=>'3','placeholder'=>'Select Amenity']).
					
					$this->Bs->input('page_url',['col'=>'6','readonly'=>true,'placeholder'=>'Page / Canonical Url','label'=>'Page / Canonical Url']).
					$this->Bs->input('video_link_1',['col'=>'6','placeholder'=>'Video Link 1','rows'=>'1']).
					$this->Bs->input('video_link_2',['col'=>'6','placeholder'=>'Video Link 2','rows'=>'1'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('description',['col'=>'12','class'=>'rich-editor','rows'=>'5'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('overview',['col'=>'12','class'=>'rich-editor','rows'=>'5'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('payment_terms',['col'=>'12','class'=>'rich-editor','rows'=>'5'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('cancellation_policy',['col'=>'12','class'=>'rich-editor','rows'=>'5'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					//$this->Bs->input('map',['col'=>'6','rows'=>'1']).
					$this->Bs->input('OurTeam', array('empty'=>'Select',
						'options'=>$ourTeams,'col'=>3,'label'=>'Our Scholars','multiple'=>true)).
				    $this->Bs->input('OurJourny.broucher_file', array('label' => __('Upload Broucher'), 'type'=>'file', 'col'=>'4')).
		      		 '</div></div>'.

		      		 $this->Bs->input('OurJourny.upload_map', array('label' => __('Upload Map'), 'type'=>'file', 'col'=>'3')).
		      		 '</div></div>'.
					$this->Bs->input('active', array('col'=>'2','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))

				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('meta_keywords',['col'=>'6','rows'=>'3']).
					$this->Bs->input('meta_description',['col'=>'6','rows'=>'3'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['OurJourny']['journey_banner'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'imageBanner']).
								$this->Bs->input('OurJourny.journey_banner',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $mainImgPath.' id="blah" class="imageBanner">'.

							$this->Bs->input('OurJourny.journey_banner',['type'=>'file','id'=>'imgupload','label'=>false]).
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
	$('#OurJournyName').keyup(function(){
		var value = $(this).val().toLowerCase();
		
		var result = value.replace(/[_\s()&,]/g, function(match) {
		    if (match === '&') {
		      return 'and'; // Replace '&' with 'and'
		    }else if (match === ',') {
     		   return ''; // Replace ',' with space
   		    }else {
		      return '-'; // Replace spaces, underscores, and parentheses with '-'
		    }
		 });
		
		//var ourJourneyId = "<?php echo $ourJourneyId; ?>";

		// alert(ourJourneyId);

		var url = "<?php echo $url;?>" +'/'+ 'trail' +'/' + result;
		$('#OurJournyPageSlug').val(result);
		$('#OurJournyPageUrl').val(url);
	});

 /*Update From Page Slug*/
$('#OurJournyPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&,]/g, function(match) {
	    if (match === '&') {
	      return 'and'; // Replace '&' with 'and'
	    }else if (match === ',') {
     		   return ''; // Replace ',' with space
   		} else {
	      return '-'; // Replace spaces, underscores, and parentheses with '-'
	    }
	 });
	$(this).val(result);
	//var ourJourneyId = "<?php echo $ourJourneyId; ?>";
	var url = "<?php echo $url;?>" +'/'+ 'trail' +'/' + result;
	$('#OurJournyPageUrl').val(url);
});	
<?php $this->end(); ?>
});
</script>