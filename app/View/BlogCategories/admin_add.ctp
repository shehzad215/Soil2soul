<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Categories'), array('controller'=>'blog_categories', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Blog Category'), array('controller'=>'blog_categories', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogCategories form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Blog Category'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			/*$dropdownMenuLink[] = $this->Bs->link(__('Blog Categories'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
*/			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BlogCategory', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php

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
					$this->Bs->input('BlogCategory.image_file', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))	
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
        type: "post"
    };
    
    $('[id*="BlogCategoryOrder"').rules( "add", {
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