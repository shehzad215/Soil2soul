<div class="loginbg">
<div class="container">
<?php if(!$isLoggedIn) { ?>
<div class="row">
	<div class="col-md-4 col-sm-3"></div>
	<div class="col-md-4 col-sm-6">
		<div class="loginbox">
			<?php echo $this->Bs->create('User', array('class'=>'form-vertical login-form')); ?>
			<div class="logo">
				<img src="<?php echo $this->webroot;?>img/logo.png" alt="Soil 2 Soul : Expeditions">
			</div>
			<div class="companyname"></div>
			<h2>Admin Login</h2>
			<?php echo $this->Session->flash(); ?>				
			<!-- UserName -->
			<div class="loginfiledmar">
				<!-- <input type="text" class="logintextfield" placeholder="Username"> -->
				<?php echo $this->Bs->input('username',['placeholder'=>'Username','class'=>'logintextfield']);?>
			</div>	
			<div class="loginfiledmar">
				<!-- <input type="password" class="logintextfield" placeholder="Password"> -->
				<?php echo $this->Bs->input('password',['placeholder'=>'Password','class'=>'logintextfield']);?>
			</div>
			
			<div class="row">
				<div class="col-xs-7">
					<div class="forgotpasswordtext"><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'forgot_password'))?>">Forgot Password?</a></div>    
				</div>
			<div class="col-xs-5 text-right"><button type="submit" class="loginbtn">Login</button></div>    
			</div>
			<?php echo $this->Form->end(); ?>	
		</div>	
	</div>	
</div>	
<?php } else { ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="loginbox">
				<h3>You are already logged in.</h3>
				<h4 align="center"><?php echo $this->Html->link(__('Home'), '/')?></h4>
			</div>
		</div>
	</div>
<?php } ?>
</div>	
</div>