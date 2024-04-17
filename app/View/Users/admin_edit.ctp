<?php 

$roleId = (isset($this->request->data['User']['role_id'])) ? $this->request->data['User']['role_id'] : '';
$pageTitle = ($roleId == 2) ? 'Staff' : 'Users';	
$action = ($roleId == 2) ? 'staff' : 'index';

	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__($pageTitle), array('controller'=>'users', 'action'=>$action), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Update '.$pageTitle), array('controller'=>'users', 'action'=>'admin_edit', $this->Form->value('User.id')), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row users form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
 		<?php echo __('Update User'); ?> <?php echo $this->Bs->loader(); ?>        
	</div>
		
		<div class="actions">
		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			$dropdownMenuLink[] = $this->Bs->link(__('View'), array('action'=>'view', $this->Form->value('User.id')), array('icon'=>'search', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $this->Form->value('User.id')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm', 'data-toggle'=>'modal-manager'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('User', array('class'=>'form-vertical','type'=>'file'));?>
 <div class="form-body">
		<?php
				$imagePath = $this->webroot.'files/user/image_file/'.$this->request->data['User']['id'].'/'.$this->request->data['User']['image_file'];
				$imageView = (!empty($this->request->data['User']['image_file'])) ? '<img src='. $imagePath.' id="blah" class="uplodedimageFile">' : $this->html->image('no-image.png',['id'=>'blah','class'=>'uplodedimageFile']);
				echo $this->Bs->input('id');
				echo $this->html->div('tab-box',
					$this->html->div('row',
								$this->Bs->input('salutation_id', array('empty'=>'Select', 'class'=>'addNewSalutationId','col'=>'3')).
								$this->Bs->input('role_id', array('empty'=>'Select', 'class'=>'addNewRoleId','col'=>'3')).
							
							 $this->Bs->input('first_name',['col'=>'3']).	
							  $this->Bs->input('last_name',['col'=>'3'])
					)
			);
					echo $this->html->div('tab-box',
					$this->html->div('row',
							
								$this->Bs->input('contact_no',['col'=>'3','class'=>'numeric']).
							 $this->Bs->input('email',['col'=>'3']).
								$this->Bs->input('username',['col'=>'3']).	
							 $this->Bs->input('password',['col'=>'3','disabled'=>true,'append'=>array('icon'=>array('eye', 'random'))])
					)
			);
		echo $this->html->div('tab-box',
			$this->html->div('row',
				$this->html->div('col-sm-3',
					$this->html->div('passportphoto',
							$imageView.
							$this->Bs->input('User.image_file',['type'=>'file','id'=>'imgupload','label'=>false]).
							'</div></div>'.
							$this->html->tag('button','Upload Image',['type'=>'button','class'=>'btn btn-default btn-file uploadImageBtn','id'=>'OpenImgUpload'])
					)
				).
				$this->Bs->input('active', array('col'=>'3','type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'],'default' => 0))	
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

$('.randomIcon').click(function(e) {
      var randomstring = Math.random().toString(36).slice(-8);
      $('#UserPassword').val(randomstring);
});
$('.eyeIcon').click(function(e) {
      var field = $('#UserPassword');
      var iconTag = $(this).find('i');
      var field1 = $('#UserPassword').val();


  	  $("#newPassword").val(field1);

      if(iconTag.hasClass('fa-eye')) {
         iconTag.removeClass('fa-eye').addClass('fa-eye-slash');
      } else { 
         iconTag.removeClass('fa-eye-slash').addClass('fa-eye');
      }
      if(field.attr('type') == 'text') {
         field.attr('type', 'password');
         field.attr('disabled',true);
      } else {
         field.attr('type', 'text');
         field.attr('disabled',false);
      }
   });
	
	$("#UserPassword").blur(function(){
  	var field = $('#UserPassword').val();
  	$("#newPassword").val(field);
  });

	var uniqueRule = {
        url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
        type: "post",
        data: {
            "data[User][id]": "<?php echo $this->Form->value('User.id'); ?>"
        }
    };
    
    $('[id*="Username"').rules( "add", {
        remote: uniqueRule,        
        messages: {
            remote: '<?php echo __('Username already present.'); ?>'
        }
    });
        
    $('[id*="Email"]').rules( "add", {
        remote: uniqueRule,
        messages: {
            remote: '<?php echo __('Email ID already present.'); ?>'
        }
    });

    $('[id*="ContactNo"]').rules( "add", {
        remote: uniqueRule,
        messages: {
            remote: '<?php echo __('Contact No. already present.'); ?>'
        }
    });

  

<?php $this->end(); ?>
});
</script>