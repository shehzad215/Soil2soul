<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Videos'), array('controller'=>'videos', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Video'), array('controller'=>'videos', 'action'=>'admin_edit', $this->Form->value('Video.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row videos form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Video'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Video.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Video.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Videos'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Video', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php
		$mainImgPath =  $this->webroot.'files/video/image_file/'.$this->request->data['Video']['id'].'/'.$this->request->data['Video']['image_file'];
			echo $this->Bs->input('id');
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
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['Video']['image_file'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'imageBanner']).
								$this->Bs->input('Video.image_file',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $mainImgPath.' id="blah" class="imageBanner">'.

							$this->Bs->input('Video.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
							'</div></div>'
						)
					).

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