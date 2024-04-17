<div class="loginbg">
<div class="container">
<?php if(!$isLoggedIn) { ?>
	<div class="row">
		<div class="col-md-3 col-sm-4"></div>
		<div class="col-md-6 col-sm-8">
			<div class="loginbox">
				<?php echo $this->Bs->create('User', array('class'=>'form-vertical login-form')); ?>
				<div class="logo"><img src="<?php echo $this->webroot;?>img/logo.png"></div>
				<!-- <div class="companyname">Mind Body Health</div> -->
				<h2>Forgot Password</h2>
				<?php echo $this->Session->flash(); ?>
				<div class="loginfiledmar">
					 <?php echo $this->Bs->input('username', array('label'=>'Please Enter Registered Email ID', 'placeholder'=>'Enter your registered email id')); ?>
				</div>
				 <div class="row">
				 	<div class="col-sm-6">
				 		<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'login'))?>"><button type="button" class="loginbtn">Back To Login</button></a>
            		</div>
            		<div class="col-sm-6"><button type="submit" class="loginbtn" style="width: 100%;">Reset Password</button></div>
				 </div>
			</div>
		</div>
	</div>	
<?php } else { ?>
	<h3>You are already logged in.</h3>
	<h4 align="center"><?php echo $this->Html->link(__('Home'), '/')?></h4>
<?php } ?>
</div>
</div>
</div>