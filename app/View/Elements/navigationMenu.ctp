<?php 
    $Username =  $usedetailsid = $imagename = $file = "";
    $Username = $this->Session->read('Auth.User.name');
    $usedetailsid = $this->Session->read('Auth.User.id');
    $imagename = $this->Session->read('Auth.User.image_file');
    if($this->Session->read('Auth.User.image_file')){
        if(!empty($imagename)){
            $file = $this->webroot.'app/webroot/files/user/image_file/'.$usedetailsid.'/'.$imagename;
        }else{
             $file = $this->webroot.'img/avatar.jpg';    
        }
    }else{
        $file = $this->webroot.'img/avatar.jpg';
    }
?>
<div class="page-header navbar navbar-fixed-top" style="height:75px;" >
	<div class="page-header-inner">
        <div class="page-logo" style="background-color: #FFF">
            <!-- Logo -->
			<?php echo $this->Bs->image('logo.png', '', ['escape'=>false, 'alt' => 'Community Work', 'class'=>'logoClass']);?>	
			<div class="menu-toggler sidebar-toggler hide"></div>
		</div>     
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
            <?php if($isLoggedIn) :?> 
                <!-- Profile pic -->
                <li><span><img alt="" class="profile-img1" src="<?php echo $file;?>"></span></li>
                <li class="dropdown dropdown-user" style="margin-top: 10px;">
                     <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> <?php echo $Username ?> </span>
                        <?php echo $this->Bs->icon('angle-down'); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <div class="pfdetails">
                            <img alt="" class="img-responsive" src="<?php echo $file;?>">
                            
                            <?php  echo $this->Bs->menuLink(__($Username), '#', array('icon'=>'user','class'=>'test') ); ?>

                            <?php  echo $this->Bs->menuLink(__('Profile'), ['controller'=>'users', 'action'=>'view'], array('icon'=>'user','class'=>'test') ); ?>
                           <?php echo $this->Bs->menuLink(__('Full Screen'), '#', array('icon'=>'arrows-alt', 'id'=>"trigger_fullscreen") )?>
                            <?php 
                                echo $this->Bs->menuLink(__('Logout'), ['controller'=>'users', 'action'=>'logout', 'admin'=>true], array('icon'=>'key') );
                            ?>
                        </div>
                    </ul>
                </li>
            <?php else : ?>
                <?php echo $this->Bs->menuLink('<i class="fa fa-user"></i> '.__('Login'), ['controller'=>'users', 'action'=>'login'], array('escape'=>false, 'data-toggle'=>"modal-manager") )?></li>
            <?php endif ?>
            </ul>
        </div>
	</div>
</div>
<div class="clearfix"></div>



