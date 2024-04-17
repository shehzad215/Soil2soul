<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Authors'), array('controller'=>'blog_authors', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Blog Author'), array('controller'=>'blog_authors', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogAuthors form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __(' Add Blog Author'); ?> <?php echo $this->Bs->loader(); ?>        
        </div>
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BlogAuthor', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('author_name',['col'=>'6']).
					$this->Bs->input('active', array('col'=>'4','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
				)
			);


			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('page_title',['col'=>'6','rows'=>'1']).
					$this->Bs->input('page_slug',['col'=>'6','rows'=>'1'])
					
				)
			);	

			echo $this->html->div('tab-box',
					$this->html->div('row',	
					$this->Bs->input('page_url',['col'=>'12','rows'=>'1','readonly'=>true])
					)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('note',['col'=>'12','rows'=>'3'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('meta_description',['col'=>'12','rows'=>'3'])
				)
			);

			echo $this->html->div('tab-box',
				$this->html->div('row',
					// $this->Bs->input('BlogAuthor.author_image', array('type'=>'fileImage', 'fileImage'=>array('width'=>'', 'height'=>''),'col'=>'4') )
					$this->Bs->input('BlogAuthor.author_image', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')]))	
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
$('#BlogAuthorAuthorName').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	var controller = "<?php echo $controller; ?>";
	var blogsauthorid = "<?php echo $blogsauthorid; ?>";
	var url = "<?php echo $url;?>" +'/'+ controller +'/'+ result;

	$('#BlogAuthorPageSlug').val(result);
	$('#BlogAuthorPageUrl').val(url);
 });

$('#BlogAuthorPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	var controller = "<?php echo $controller; ?>";
	var blogsauthorid = "<?php echo $blogsauthorid; ?>";
	var url = "<?php echo $url;?>" +'/'+ controller +'/'+ result;

	$('#BlogAuthorPageUrl').val(url);
 });

<?php $this->end(); ?>
});
</script>