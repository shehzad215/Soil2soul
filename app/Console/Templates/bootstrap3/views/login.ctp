<?php echo "<?php echo \$this->Session->flash(); ?>\n"?>
<?php echo "<?php echo \$this->Session->flash('auth', array('element'=>'alerts', 'params'=>array('classType'=>'danger') ))?>\n"?>
<?php echo "<?php if(!\$isLoggedIn) { ?>\n" ?>
<?php echo "\t<div id='userRegistration' class=''>\n
		<h3 class='form-title'><?php echo __('Login to your account'); ?></h3>
		<?php
			echo \$this->Bs->create('User', array('class'=>'form-vertical login-form'));
			echo \$this->Bs->input('username', array('label'=>false, 'placeholder'=>'Username', 'prepend'=>array('icon'=>'user')));
			echo \$this->Bs->input('password', array('label'=>false, 'placeholder'=>'Password', 'prepend'=>array('icon'=>'lock')));
			echo \$this->Html->tag('div',
				\$this->Form->button(__('Login'), array('class'=>'btn btn-primary pull-right'))
				, array('class'=>'form-actions')
			);
			echo \$this->Form->end();		
		?>\n";
?>
<?php echo "<?php } else { ?>\n" ?>
	<h3>You are already logged in.</h3>
	<h4 align="center"><?php echo "<?php echo \$this->Html->link(__('Home'), '/')?>";?></h4>
<?php echo "<?php } ?>\n"; ?>
</div>