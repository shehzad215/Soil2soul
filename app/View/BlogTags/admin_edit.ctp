<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blog Tags'), array('controller'=>'blog_tags', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Blog Tag'), array('controller'=>'blog_tags', 'action'=>'admin_edit', $this->Form->value('BlogTag.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row blogTags form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Blog Tag'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('BlogTag.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('BlogTag.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Blog Tags'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('BlogTag', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('name',['type'=>'text','col'=>'4']).
					$this->Bs->input('page_slug',['type'=>'text','col'=>'4','readonly'=>true]).
					$this->Bs->input('active', array('col'=>'4','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))
				).
				$this->html->div('row',
					$this->Bs->input('page_title',['type'=>'text','col'=>6]).
					$this->Bs->input('page_url',['type'=>'text','col'=>6,'readonly'=>true,'class'=>'utlInput','label'=>'Page Url / Canonical Url'])
				).
				$this->html->div('row',
					// $this->Bs->input('meta_keyword',['col'=>6,'rows'=>'3']).
					$this->Bs->input('meta_description',['col'=>12,'rows'=>'3'])
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
$('#BlogTagName').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	var controller = "<?php echo $controller; ?>";
	var blogstagid = "<?php echo $blogstagid; ?>";
	var url = "<?php echo $url;?>" +'/'+ controller +'/'+ result;

	$('#BlogTagPageSlug').val(result);
	$('#BlogTagPageUrl').val(url);
 });
<?php $this->end(); ?>
});
</script>