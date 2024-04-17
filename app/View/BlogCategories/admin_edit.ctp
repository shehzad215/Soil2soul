<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Categories'), array('controller'=>'blog_categories', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Blog Category'), array('controller'=>'blog_categories', 'action'=>'admin_edit', $this->Form->value('BlogCategory.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogCategories form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Blog Category'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('BlogCategory.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('BlogCategory.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Blog Categories'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BlogCategory', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
		$imagePath = $this->webroot.'files/blog_category/image_file/'.$this->request->data['BlogCategory']['id'].'/'.$this->request->data['BlogCategory']['image_file'];
		
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('order',['type'=>'text','col'=>'2','class'=>'numeric']).
					$this->Bs->input('name',['col'=>'4']).
				    $this->Bs->input('page_title',['col'=>'4','rows'=>'1']).
				    $this->Bs->input('active', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))	    
				).
				'<hr>'.
				$this->html->div('row',
					$this->Bs->input('page_slug',['col'=>'6','rows'=>'1']).
					$this->Bs->input('page_url',['col'=>'6','rows'=>'1','readonly'=>true])
				).
				'<hr>'.
				$this->html->div('row',
					$this->Bs->input('meta_description',['col'=>'6','rows'=>'2']).
					$this->Bs->input('meta_keyword',['col'=>'6','rows'=>'2'])
				)
			);
	
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['BlogCategory']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedIconFile']).
								$this->Bs->input('BlogCategory.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $imagePath.' id="blah" class="uplodedimageFile">'.

							$this->Bs->input('BlogCategory.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
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

	 var uniqueRule = {
        url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
        type: "post",
         data: {
            "data[BlogCategory][id]": "<?php echo $this->Form->value('BlogCategory.id'); ?>"
        }
    };
    
    $('#BlogCategoryOrder').rules( "add", {
        remote: uniqueRule,      
        messages: {
            remote: '<?php echo __('This OrderCode is already present.'); ?>'
        }
    });

$('#BlogCategoryName').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	var controller = "blogs";
	var blogscatid = "<?php echo $blogscatid; ?>";
	var url = "<?php echo $url;?>" +'/'+ controller +'/'+ result;
	$('#BlogCategoryPageSlug').val(result);
	$('#BlogCategoryPageUrl').val(url);

});

/*Update From Page Slug*/
$('#BlogCategoryPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	$(this).val(result);
	var controller = "blogs";
	var blogscatid = "<?php echo $blogscatid; ?>";
	var url = "<?php echo $url;?>" +'/'+ controller +'/'+ result;
	$('#BlogCategoryPageUrl').val(url);
});
<?php $this->end(); ?>
});
</script>