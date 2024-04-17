<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Authors'), array('controller'=>'blog_authors', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Blog Author'), array('controller'=>'blog_authors', 'action'=>'admin_edit', $this->Form->value('BlogAuthor.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogAuthors form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Blog Author'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('BlogAuthor.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('BlogAuthor.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
		
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BlogAuthor', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php 
		$imagePath = $this->webroot.'files/blog_author/author_image/'.$this->request->data['BlogAuthor']['id'].'/'.$this->request->data['BlogAuthor']['author_image'];
		
			echo $this->Bs->input('id');
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
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['BlogAuthor']['author_image'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedimageFile']).
								$this->Bs->input('BlogAuthor.author_image',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $imagePath.' id="blah" class="uplodedimageFile">'.

							$this->Bs->input('BlogAuthor.author_image',['type'=>'file','id'=>'imgupload','label'=>false]).
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