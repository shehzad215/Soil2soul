<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Galleries'), array('controller'=>'galleries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Admin Edit Gallery'), array('controller'=>'galleries', 'action'=>'admin_edit', $this->Form->value('Gallery.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row galleries form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php echo __('Admin Edit Gallery'); ?> <?php echo $this->Bs->loader(); ?>        </div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Gallery Categories'), array('controller'=>'gallery_categories', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('Gallery.id')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('Gallery.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
			/*$dropdownMenuLink[] = $this->Bs->link(__('Galleries'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));*/
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('Gallery', array('class'=>'form-vertical','type'=>'file'));?>
        <div class="form-body">
		<?php 
		 $imagePath = $this->webroot.'files/gallery/image/'.$this->request->data['Gallery']['id'].'/'.$this->request->data['Gallery']['image'];
		 
			echo $this->Bs->input('id');
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('order',['type'=>'text','col'=>'2','class'=>'numeric']).
					$this->Bs->input('name',['col'=>'4']).
				    $this->Bs->input('gallery_category_id', array('empty'=>'Select', 'class'=>'addNewGalleryCategoryId','col'=>'4')).
				    $this->Bs->input('active', array('type'=>'radio','col'=>'2', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0))	    
				)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->html->div('col-sm-3',
						$this->html->div('passportphoto',
							(empty($this->request->data['Gallery']['image'])) ? $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedIconFile']).
								$this->Bs->input('Gallery.image',['type'=>'file','icon'=>'file','id'=>'imgupload','label'=>false]).
								$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload']).
								'</div></div>' 
							: '<img src='. $imagePath.' id="blah" class="uplodedIconFile">'.

							$this->Bs->input('Gallery.image',['type'=>'file','id'=>'imgupload','label'=>false]).
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
	//  var uniqueRule = {
    //     url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
    //     type: "post",
    //      data: {
    //         "data[Gallery][id]": "<?php echo $this->Form->value('Gallery.id'); ?>"
    //     }
    // };
    
    // $('#GalleryOrder').rules( "add", {
    //     remote: uniqueRule,      
    //     messages: {
    //         remote: '<?php echo __('This OrderCode is already present.'); ?>'
    //     }
    // });

<?php $this->end(); ?>
});
</script>