<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Packages'), array('controller'=>'packages', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Package'), array('controller'=>'packages', 'action'=>'admin_edit', $this->Form->value('Package.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row packages form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Package'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Package.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Package.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Package', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('name',['col'=>'5']).
					$this->Bs->input('short_name',['col'=>'3']).
					$this->Bs->input('active', array('col'=>'2','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0)).
					$this->Bs->input('display_on_homepage', array('col'=>'2','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('tag_line',['col'=>'6']).
					$this->Bs->input('short_note',['col'=>'6'])				
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('page_slug',['col'=>'4']).
					$this->Bs->input('page_title',['col'=>'8','rows'=>'1']).
					$this->Bs->input('page_url',['col'=>'12','readonly'=>true])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('description',['col'=>'12','rows'=>'5','class'=>'rich-editor'])
				)
			);	
			echo $this->html->div('tab-box',
				$this->html->div('row',

		       $this->Bs->input('Package.image_file', array('label' => __('Upload Banner'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'200', 'height'=>'70'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))			
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
	$('#PackageName').keyup(function(){
		var value = $(this).val().toLowerCase();
		var result = value.replace(/[_\s()&,]/g, function(match) {
		    if (match === '&') {
		      return 'and'; // Replace '&' with 'and'
		    } else if (match === ',') {
     		   return ''; // Replace ',' with space
   			} else {
		      return '-'; // Replace spaces, underscores, and parentheses with '-'
		    }
		 });

		var packageId = "<?php echo $packageId; ?>";
		var url = "<?php echo $url;?>" +'/'+ result + '-' + packageId;
		$('#PackagePageSlug').val(result);
		$('#PackagePageUrl').val(url);
	});

 /*Update From Page Slug*/
$('#PackagePageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&,]/g, function(match) {
	    if (match === '&') {
	      return 'and'; // Replace '&' with 'and'
	    } else if (match === ',') {
     		   return ''; // Replace ',' with space
   		} else {
	      return '-'; // Replace spaces, underscores, and parentheses with '-'
	    }
	 });
	var packageId = "<?php echo $packageId; ?>";
	$(this).val(result);
	var url = "<?php echo $url;?>" +'/'+ result + '-'+ packageId;
	$('#PackagePageUrl').val(url);
});	

<?php $this->end(); ?>
});
</script>