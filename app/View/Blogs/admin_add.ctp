<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blogs'), array('controller'=>'blogs', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Blog'), array('controller'=>'blogs', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogs form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Blog'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			/*$dropdownMenuLink[] = $this->Bs->link(__('Blogs'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Blog', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('blog_date',['type'=>'text','col'=>'3','class'=>'date','value'=>$currentDate]).
					$this->Bs->input('blog_category_id', array('empty'=>'Select', 'class'=>'addNewBlogCategoryId','col'=>3,'options'=>$blogcategories)).
					$this->Bs->input('blog_author_id', array('empty'=>'Select', 'class'=>'addNewBlogAuthorId','col'=>3,'options'=>$blogAuthors)).
					$this->Bs->input('BlogTag', array('empty'=>'Select','class'=>'addNewBlogTagId',
						'options'=>$blogTags,'col'=>3,'multiple'=>true))	    

				).
				'<hr>'.
				$this->html->div('row',
					$this->Bs->input('title',['col'=>'6','rows'=>'2']).
					$this->Bs->input('page_slug',['col'=>'6','rows'=>'2'])
					
				)
			);

			echo $this->html->div('tab-box',
					$this->html->div('row',
					$this->Bs->input('page_title',['col'=>'6','rows'=>'1']).
					$this->Bs->input('page_url',['col'=>'6','rows'=>'2','readonly'=>true])
					)
			);

			echo $this->html->div('tab-box',	
					$this->html->div('row',
					$this->Bs->input('note',['col'=>'12','rows'=>'3'])
				)
			);
	
			echo $this->html->div('tab-box',
					$this->html->div('row',
						$this->Bs->input('description',['col'=>'12','rows'=>'10','class'=>'rich-editor'])
					)
				);	

			echo $this->html->div('tab-box',	
					$this->html->div('row',
					$this->Bs->input('meta_description',['col'=>'6','rows'=>'2']).
					$this->Bs->input('meta_keyword',['col'=>'6','rows'=>'2'])
				   )
				);	

			echo $this->html->div('tab-box',
				$this->html->div('row',

		       $this->Bs->input('Blog.main_image', array('label' => __('Upload Banner'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'200', 'height'=>'70'),'append'=>['help-block-text'=>__('To Change Image Click on Image')])).

		        $this->Bs->input('active', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
				    $this->Bs->input('is_display_homepage', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))			
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

$('#BlogBlogCategoryId').change(function() {
	var categoryText = $('#BlogBlogCategoryId').find('option:selected').text().toLowerCase();
	var catslug = categoryText.replace(/[_\s]()/g, '-');
	/*alert(catslug);*/
	var value = $('#BlogTitle').val();
    var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
       return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });
	var blogsid = "<?php echo $blogsid; ?>";
	var url = "<?php echo $url;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;


	 $('#BlogPageUrl').val(url);

});


$('#BlogTitle').keyup(function(){
	var value = $(this).val().toLowerCase();
  var name = capitalizeFirstLetter(value);

  //alert(name);

	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
       return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });

	var top = $('#BlogBlogCategoryId').val();
	if(top != '')
	{
	var categoryText = $('#BlogBlogCategoryId').find('option:selected').text().toLowerCase();
	var catslug = categoryText.replace(/[_\s]()/g, '-');
	var blogsid = "<?php echo $blogsid; ?>";
	var url = "<?php echo $url;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;
	//alert(url);
	
	}
	else{
	var blogsid = "<?php echo $blogsid; ?>";
	var url = "<?php echo $url;?>"  +'/'+ result +'-'+ blogsid;
	//alert(url);
	}

	 $('#BlogPageSlug').val(result);
	 $('#BlogPageUrl').val(url);

});

/*Update From Page Slug*/
$('#BlogPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	$(this).val(result);
	var top = $('#BlogBlogCategoryId').val();
	if(top != '')
	{
	var categoryText = $('#BlogBlogCategoryId').find('option:selected').text().toLowerCase();
	var catslug = categoryText.replace(/[_\s]()/g, '-');
	var blogsid = "<?php echo $blogsid; ?>";
	var url = "<?php echo $url;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;
	//alert(url);
	
	}
	else{
	var blogsid = "<?php echo $blogsid; ?>";
	var url = "<?php echo $url;?>"  +'/'+ result +'-'+ blogsid;
	//alert(url);
	}
	$('#BlogPageUrl').val(url);
});

function capitalizeFirstLetter(text) {
    return text.replace(/^(.)|\s(.)/g, function($1) {
        return $1.toUpperCase();
    });
}

<?php $this->end(); ?>
});
</script>