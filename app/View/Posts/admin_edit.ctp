<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog'), array('controller'=>'posts', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Post'), array('controller'=>'posts', 'action'=>'admin_edit', $this->Form->value('Post.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row posts form">
<div class="col-md-12">
<div class="portlet box blue-hoki">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Blog'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				// $this->Bs->menuLink(__('Blog'), array('controller'=>'posts', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				// $this->Bs->menuLink(__('Template Layouts'), array('controller'=>'template_layouts', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				// $this->Bs->menuLink(__('Post Images'), array('controller'=>'post_images', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Post.id')), array('icon'=>'search', 'class'=>'btn default btn-sm'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Post.id')), array('icon'=>'trash-o', 'class'=>'btn default btn-sm'));
			endif;
			$dropdownMenuLink[] = $this->Bs->link(__('Blog'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn default btn-sm', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-default btn-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
        <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
        </div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Post', array('class'=>'form-vertical'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			//echo $this->Bs->input('parent_id', array('empty'=>'Select', 'options'=>$parentPosts,'class'=>'addNewParentId', 'append'=>array('button'=>'Add New')));
			//echo $this->Bs->input('lft');
			//echo $this->Bs->input('rght');
			echo $this->Bs->input('title');
			echo $this->Bs->input('slug');
			echo $this->Bs->input('BlogCategory', array());
			echo $this->Bs->input('body', array('class'=>'rich-editor'));
			


            echo $this->Bs->input('Post.cover_image', array('type'=>'fileImage', 'fileImage'=>array('width'=>'800', 'height'=>'270'),
                'append'=>['help-block-text'=>__('Format JPG, PNG. Recommended Dimensions: Width - 1600px, Height - 540px')]
            ));

            // echo $this->Bs->input('Post.featured_image', array(
            //     'type'=>'fileImage', 'fileImage'=>array('width'=>'330', 'height'=>'274'), 
            //     'append'=>[
            //         'help-block-text'=>__('Format JPG, PNG. Recommended Dimensions: Width - 330px, Height - 274px') 
            //     ]
            // ));
			//echo $this->Bs->input('template_layout_id', array('empty'=>'Select', 'class'=>'addNewTemplateLayoutId', 'append'=>array('button'=>'Add New')));
			echo $this->Bs->input('meta_title');
			echo $this->Bs->input('meta_keyword');
			echo $this->Bs->input('meta_description');
			echo $this->Bs->input('active', array('type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0));
		?>
        </div>
		<?php
			echo $this->Bs->formEnd(array(
				$this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-primary')),
				$this->Bs->link('<i class="fa fa-refresh"></i> '.__('Cancel'), ['controller'=>'posts', 'action'=>'index', 'admin'=>true ], array('type'=>'button', 'class'=>'btn btn-primary', 'escape'=>false ))
			));
		?>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
$(function() {
<?php $this->start('appScript'); ?>
	$('body').on('change', 'input[name*="data[Post][title]"]', function() {
		$('input[name*="data[Post][slug]"]').val(convertToSlug($(this).val()));
	});

	function convertToSlug(Text){
	    return Text
	        .toLowerCase()
	        .replace(/ /g,'-')
	        .replace('+','')
	        .replace(/[^\w-]+/g,'')
	        ;
	}	



	var remoteRule = {
		url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
		type: "post",
		data: {
			"data[Post][id]": "<?php echo $this->Form->value('Post.id'); ?>"
		}
	};

	$('[id*="PostSlug"]').rules( "add", {
        remote: remoteRule,
        messages: {
            remote: '<?php echo __('Slug already present.'); ?>'
        }
    });

<?php $this->end(); ?>
});
</script>