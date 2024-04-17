<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Videos'), array('controller'=>'videos', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Add Video'), array('controller'=>'videos', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row videos form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Add Video'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			/*$dropdownMenuLink[] = $this->Bs->link(__('Videos'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Video', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('order',['col'=>'1','class'=>'numeric']).
					$this->Bs->input('title',['col'=>'5']).
					$this->Bs->input('video_category_id', array('empty'=>'Select', 'class'=>'addNewVideoCategoryId','col'=>'3','options'=>$videocategories)).
					$this->Bs->input('BlogTag', array('empty'=>'Select','class'=>'addNewBlogTagId',
						'options'=>$blogTags,'col'=>'3','multiple'=>true))
					)
			);
/*			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('video_link',['col'=>'12','rows'=>'1'])
				)
			);*/
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('description',['col'=>'12','rows'=>'3','class'=>'rich-editor'])
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('Video.image_file', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'3', 'fileImage'=>array('width'=>'200', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')])).
					$this->Bs->input('active', array('type'=>'radio','col'=>'3', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
					$this->Bs->input('is_display_homepage', array('type'=>'radio','col'=>'3', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
					$this->Bs->input('is_external_link', array('type'=>'radio','col'=>'3', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0)).
					$this->Bs->input('video_link',['col'=>'9'])
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
<?php $this->end(); ?>
});
</script>