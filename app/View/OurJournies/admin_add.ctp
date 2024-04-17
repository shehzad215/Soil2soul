<?php //debug($ourTeams);die;
	
	$firstUrl = (!empty($package_id)) ? $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index','OurJourny.package_id'=>$package_id), array('rel'=>'v:url', 'property'=>'v:title')) : $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title'));

	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $firstUrl, array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Add Our Journey'),array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourJournies form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Add Our Journey'); ?> <?php echo $this->Bs->loader(); ?>        
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
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

		       $this->Bs->input('OurJourny.journey_banner', array('label' => __('Upload Banner'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'200', 'height'=>'70'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))

		       	
				)

			);

			// echo $this->Bs->input('currency_id', array('empty'=>'Select', 'class'=>'addNewCurrencyId', 'append'=>array('button'=>'Add New')));
			// echo $this->Bs->input('name');
			// echo $this->Bs->input('video_link');
			// echo $this->Bs->input('description');
			// echo $this->Bs->input('no_of_nights');
			// echo $this->Bs->input('total_seat');
			// echo $this->Bs->input('cost');
			// echo $this->Bs->input('map');
			// echo $this->Bs->input('page_title');
			// echo $this->Bs->input('page_slug');
			// echo $this->Bs->input('meta_description');
			// echo $this->Bs->input('meta_keywords');
			// echo $this->Bs->input('page_url');
			// echo $this->Bs->input('active');
			// echo $this->Bs->input('Amenity');
			// echo $this->Bs->input('OurTeam');
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
		var result = value.replace(/[_\s(),&]/g, function(match) {
		    if (match === '&') {
		      return 'and'; // Replace '&' with 'and'
		    }else if (match === ',') {
     		   return ''; // Replace ',' with space
   		    } else {
		      return '-'; // Replace spaces, underscores, and parentheses with '-'
		    }
		 });
		//var ourJourneyId = "<?php echo $ourJourneyId; ?>";

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
	//var ourJourneyId = "<?php //echo $ourJourneyId; ?>";
	var url = "<?php echo $url;?>" +'/'+ 'trail' +'/' + result;
	$('#OurJournyPageUrl').val(url);
});	

<?php $this->end(); ?>
});
</script>