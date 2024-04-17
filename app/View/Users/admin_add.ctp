<style type="text/css">
	.teacherRole{
		display: none;
	}
</style>
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__($pageTitle), array('controller'=>'users', 'action'=>$action), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Add '.$pageTitle), array('controller'=>'users', 'action'=>'admin_add'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<div class="row users form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
    <?php echo __('Add User / Staff'); ?> <?php echo $this->Bs->loader(); ?>        
   </div>
		
		<div class="actions"></div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Bs->create('User', array('class'=>'form-vertical','type'=>'file'));?>
  <div class="form-body">
		<?php
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
							 $this->Bs->input('password',['col'=>'3','append'=>array('icon'=>array('eye', 'random'))])
					)
			);
			echo $this->html->div('tab-box',
				$this->html->div('row',
					$this->Bs->input('User.image_file', array('label' => __('Upload Image'), 'type'=>'fileImage', 'col'=>'4', 'fileImage'=>array('width'=>'100', 'height'=>'100'),'append'=>['help-block-text'=>__('To Change Image Click on Image')])).
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
			var uniqueRule = {
        url: '<?php echo $this->Html->url(array('action'=>'isUnique')); ?>',
        type: "post"
    };
    
    $('[id*="Username"').rules( "add", {
        remote: uniqueRule,        
        messages: {
            remote: '<?php echo __('This Username is already present.'); ?>'
        }
    });
        
    $('[id*="Email"]').rules( "add", {
        remote: uniqueRule,
        messages: {
            remote: '<?php echo __('This Email ID is already present.'); ?>'
        }
    });

    $('#UserContactNo').rules( "add", {
        remote: uniqueRule,
        messages: {
            remote: '<?php echo __('Contact No. already present.'); ?>'
        }
    });

    $('.randomIcon').click(function(e) {
					var randomstring = Math.random().toString(36).slice(-8);
					$('#UserPassword').val(randomstring);
				});

    $('.eyeIcon').click(function(e) {
					var field = $('#UserPassword');
					var iconTag = $(this).find('i');
					
					if(iconTag.hasClass('fa-eye')) {
						iconTag.removeClass('fa-eye').addClass('fa-eye-slash');
					} else {	
						iconTag.removeClass('fa-eye-slash').addClass('fa-eye');
					}
					if(field.attr('type') == 'text') {
						field.attr('type', 'password');
					} else {
						field.attr('type', 'text');
					}
				});

    var roleId = $('#UserRoleId').val();
    staff(roleId);

    $('#UserRoleId').change(function(){
    				var roleId = $('#UserRoleId').val();
    				staff(roleId);
    });

    function staff(roleId){
    			if(roleId == 2){
    					$('.teacherRole').show();
    			}else{
    					$('.teacherRole').hide();
    			}
    }

    $(document).on('keypress','.numeric',(function (event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (
         (charCode != 45 || $(this).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
         (charCode != 46 || $(this).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
         (charCode < 48 || charCode > 57))
        return false;
    return true;
}));

/*Setup Email Id*/
$('#UserDominId').change(function(){
			let domainID = $(this).val();
		 setupEmail(domainID);
});

$('#UserFirstName').keyup(function(){
			let domainID = $('#UserDominId').val();
		 setupEmail(domainID);
});

$('#UserLastName').keyup(function(){
			let domainID = $('#UserDominId').val();
		 setupEmail(domainID);
});


function setupEmail(domainID){
		let firstName = $('#UserFirstName').val();
		let lastName = $('#UserLastName').val();

		/*let name = firstName +' '+ lastName;*/

		 $.ajax({
        type: "POST",
        data: {'firstName':firstName,'lastName':lastName,'domainID':domainID},
        url: "<?php echo $this->Html->url(['controller'=>'users', 'action'=>'email_setup']); ?>",
         dataType:'json',
        success : function(data){
          	$('#UserEmail').val(data.emailName);
        }
    });

}


<?php $this->end(); ?>
});
</script>