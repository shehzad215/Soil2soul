<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'eFEWA (Exhibition & CRM System)');
?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html>
<html>
<head>
<?php // debug($this->webroot);?>
<style type="text/css">
	.logoClass{ margin: 15px; }
	

</style>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?></title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
		echo $this->Html->meta('icon');

    	echo $this->Bs->css('css-common');
        echo $this->Bs->css('layout/theme/css-admin-theme');
        echo $this->Bs->css('login');

        echo $this->fetch('meta');
		echo $this->fetch('css');
    ?>
    <?php echo $this->Bs->script('js-jquery'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->	
</head>
<body class="login">
	<header>
	</header>
	<style type="text/css">
		.login .content { background-color: inherit !important; border: 1px solid; border-color: #808080;  
			-webkit-box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);
			box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);
		}
		.login .content .form-actions{ background-color: inherit !important; }
		.login .logo { padding: 0px; }
		/*.page-container, body, .login { background-color: #fff !important; }*/
		.login{
		background-image: url(<?php echo $this->webroot;?>img/worldmap.png);
		background-color:#eee !important;
		background-repeat: no-repeat !important;
		background-attachment: fixed !important;
		background-size: 100% auto;
		/*background-position: center;*/
	}
	</style>
	
	<div class="page-container">
		<div class="logo">
			<h1 class="page-logo">
            <?php
                echo $this->Bs->image('eFEWA_logo.jpg', '', ['height'=>'41', 'width'=>'161', 'escape'=>false, 'alt' => 'eFEWA', 'class'=>'logoClass' ]);
            ?>  
            </h1> 
		</div>
            <!-- <div class="logo" style="text-align: center;">
                  <h1><b>eFEWA</b></h1>
            </div> -->
            <!-- <h1 class="page-logo" style="text-align:center;">
	            <b>
	                <?php
	                    /*echo $this->Html->link(
	                        __('e-'), '/', array('style'=>'color:white')
	                    );
	                    echo $this->Html->link(
	                        __('FEWA'), '/', array('style'=>'color:red')
	                    );*/
	                ?>  
	            </b>
	        </h1> -->
		<div class="content">
			<div class="animated fadeIn">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
	
	<span class="js">
	<?php
		echo $this->Bs->script('js-common', ['defer'=>true]);
		echo $this->Bs->script('js-admin-theme', ['defer'=>true]);
		
		if (Configure::read('debug') > 0):
			echo $this->Html->css("prism.min.css");
			echo $this->Html->script("prism.min.js");
		endif;
	?>
	<?php echo $this->element('modal'); ?>
	<?php echo $this->element('validateScript'); ?>
	<?php echo $this->element('appScript'); ?>
	
	<?php echo $scripts_for_layout;?>

    <?php echo $this->Bs->script('application', ['defer'=>true]); ?>
	</span>
</body>
</html>