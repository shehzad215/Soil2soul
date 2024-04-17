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
<style type="text/css">
    body {
        background-color: #fff !important;
        /*background-image: url('/efewa/app/webroot/img/Alien.jpg');*/
    }
    .form-control{
        text-transform: capitalize !important;
    }
    .select2-results{text-transform: capitalize !important;}
</style>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $this->Html->meta('icon');

        echo $this->AssetCompress->css('css-common');
        echo $this->AssetCompress->css('layout/theme/css-admin-theme');

        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>
    <?php echo $this->Bs->script('js-jquery'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed">
	
    <div class="container-fluid">
        <!-- <div class="page-container">
            
            <div class="page-content-wrapper">
                <div class="page-content"> -->
                    <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->Session->flash(); ?>
                        </div>
                    </div>
                    <?php echo $this->fetch('content'); ?>
                </div>
    <!--         </div>
    	</div>
        
       </div> -->
    </div>

	<span class="js">
    <?php
        /*echo $this->Bs->script('js-common', ['defer'=>true]);
        echo $this->Bs->script('js-admin-theme', ['defer'=>true]);*/

        echo $this->AssetCompress->script('js-common');
        echo $this->AssetCompress->script('js-admin-theme');
        
        if (Configure::read('debug') > 0):
            echo $this->Html->css("prism.min.css");
            echo $this->Html->script("prism.min.js");
            echo $this->Html->script("intro/intro.js");
            echo $this->Html->css("intro/introjs.css");
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