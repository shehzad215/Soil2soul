<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Teams'), array('controller'=>'our_teams', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Our Team'), array('controller'=>'our_teams', 'action'=>'admin_edit', $this->Form->value('OurTeam.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row ourTeams form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Our Team'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('OurTeam.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('OurTeam.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('OurTeam', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
		
			$imagePath = $this->webroot.'files/our_team/image_file/'.$this->request->data['OurTeam']['id'].'/'.$this->request->data['OurTeam']['image_file'];

			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
				$this->Bs->input('order',['col'=>'1','class'=>'numeric']).
				$this->Bs->input('name',['col'=>'3']).
					$this->Bs->input('OurTeamType', array('empty'=>'Select','class'=>'addNewOurTeamTypeId',
						'options'=>$ourTeamTypes,'col'=>3,'multiple'=>true)).
					$this->Bs->input('designation',['col'=>'3']).	
					$this->Bs->input('expertise',['col'=>'2'])
					)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('page_slug',['col'=>'6']).
					$this->Bs->input('page_title',['col'=>'6']).
						$this->Bs->input('page_url',['col'=>'12','readonly'=>true]).
						$this->Bs->input('meta_description',['col'=>'12','rows'=>'3','class'=>''])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
						$this->Bs->input('description',['col'=>'12','rows'=>'3','class'=>'rich-editor'])
					)
			);	
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->html->div('col-sm-4',
						$this->html->div('passportphoto',
							(empty($this->request->data['OurTeam']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedIconFile']).
								$this->Bs->input('OurTeam.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $imagePath.' id="blah" class="uplodedimageFile">'.

							$this->Bs->input('OurTeam.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
							'</div></div>'
						)
					).
					/*$this->html->div('col-sm-4',
						$this->Bs->input('its_scholar', array('type'=>'radio','col'=>'12', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))
					).*/
					$this->html->div('col-sm-4',	
				   		 $this->Bs->input('active', array('type'=>'radio','col'=>'12', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))	
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
$('#OurTeamName').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
       return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });

	var category = 'our_teams';
	var url = "<?php echo $url;?>" +'/'+ category +'/'+ result;
	$('#OurTeamPageSlug').val(result);
	$('#OurTeamPageUrl').val(url);

});

/*Change By Slug*/
$('#OurTeamPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });
   $(this).val(result);

   var category = 'our_teams';
   var url = "<?php echo $url;?>" +'/'+ category +'/'+ result;
   $('#OurTeamPageUrl').val(url);
});
<?php $this->end(); ?>
});
</script>