<?php
/**
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
$cakeDescription = __d('cake_dev', 'eFEWA');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?> : <?php echo $cakeDescription ?></title>
    
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $this->Html->meta('icon');

        echo $this->Bs->css('css-common');
        echo $this->Bs->css('css-common-front');

        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>
    <?php echo $this->Bs->script('js-jquery'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->
<?php echo $this->Html->script(['jquery.blockUI']);?>
   
</head>
<body>
	<div class="maiwrapper">
    	<?php echo $this->element('frontendHeader'); ?>
        <div class="container">
            <div class="contentarea">
            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
            <div id="domMessage" style="display:none;">
                <h5> <?php echo $this->Html->image("loading.gif");?> Please wait we are processing your request <br>Do not press Refresh button And Backspace button of your browser</h5> 
            </div>        
            </div>
        </div>
    	<?php echo $this->element('frontendFooter'); ?>
    </div>
	<span class="js">
    	<?php
            echo $this->Bs->script('js-common', ['defer'=>true]);
            echo $this->Bs->script('js-front-theme', ['defer'=>true]);
            echo $this->Bs->script('js-front-theme-home', ['defer'=>true]);
            echo $this->Html->script("colorbox/jquery.colorbox.js");

    		if (Configure::read('debug') > 0):
                echo $this->Html->css("prism.min.css");
                echo $this->Html->script("prism.min.js");
            endif;
        ?>
        <?php echo $this->element('modal'); ?>
        <?php echo $this->element('validateScript'); ?>
        <?php echo $this->element('appScript'); ?>

        <?php echo $scripts_for_layout;?>

        <?php echo $this->Html->script('application'); ?>
	</span>
    <script type="text/javascript">
         $.blockUI({ message: $('#domMessage') });
    </script>
</body>
</html>