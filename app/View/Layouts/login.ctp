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

$cakeDescription = __d('cake_dev', 'Soil2Soul');
?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php
		echo $this->Html->meta('icon');
    	echo $this->Bs->css('custome_css/bootstrap');
        echo $this->Bs->css('custome_css/bootstrap-theme');
        echo $this->Bs->css('custome_css/login');
        echo $this->fetch('meta');
		echo $this->fetch('css');

    ?>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php echo $this->Bs->script('js-jquery'); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->	
</head>
<body>
<main class="mainwrapper"> 
	<?php echo $this->fetch('content'); ?>
</main>
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