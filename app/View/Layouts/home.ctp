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
$cakeDescription = __d('cake_dev', 'Soil 2 Soul');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
<?php
//echo $this->Bs->css('css-common');
echo $this->Bs->css('css-common-front');
echo $this->element('frontendNavigationMenu'); 
echo $this->Html->meta('icon');

?>
<?php //echo $this->Bs->script('js-jquery'); ?>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVJ44X3X"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php echo $this->element('included_modal'); ?> 
    <?php echo $this->element('frontendHeader'); ?>    
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('frontendFooter'); ?>
    <?php //echo $this->Html->script('application'); ?>
     <span class="js">
    <?php
        //echo $this->Bs->script('js-common', ['defer'=>true]);
        echo $this->Bs->script('js-front-theme', ['defer'=>true]);
        if (Configure::read('debug') > 0):
            echo $this->Html->css("prism.min.css");
            echo $this->Html->script("prism.min.js");
            echo $this->Html->script("intro/intro.js");
            echo $this->Html->css("intro/introjs.css");
            endif;
     ?>
    <?php //echo $this->element('modal'); ?>
    <?php //echo $this->element('validateScript'); ?>
    <?php //echo $this->element('appScript'); ?>
    <?php echo $scripts_for_layout;?>

    <?php //echo $this->Bs->script('application', ['defer'=>true]); ?>
    
</span> 
</body>
</html>
<script type="text/javascript">
    $(document).on('keypress','.numeric',(function (event) {
    var charCode = (event.which) ? event.which : event.keyCode
    if (
         (charCode != 45 || $(this).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
         (charCode != 46 || $(this).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
         (charCode < 48 || charCode > 57))
        return false;
    return true;
}));
</script>