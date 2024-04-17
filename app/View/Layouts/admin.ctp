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
<style>
    
    
    
    /*body { zoom: 90% !important; }*/
    /*.loader {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url('<?php echo Router::url('/', true)?>img/loading.gif') 50% 50% no-repeat rgb(249,249,249);opacity: .8;}*/
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

        echo $this->Bs->css('css-common');
        echo $this->Bs->css('layout/theme/css-admin-theme');

        /*echo $this->AssetCompress->css('css-common');
        echo $this->AssetCompress->css('layout/theme/css-admin-theme');*/

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->Html->css(array('sweetalert'));
        echo $this->Html->script(array('sweetalert'));
   /*     echo $this->Bs->css('crm-main');
        echo $this->Bs->css('master-main');*/
        echo $this->Bs->css('custome_css/backend_developer');
    ?>
    <?php echo $this->Bs->script('js-jquery'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->
    <script type="text/javascript">
    $(document).ready(function (){
      $('.back-btn').click(function (){
          history.go(-1);
     });

 });


</script>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed" style=" background: linear-gradient(to bottom, #020111 10%, #3a3a52 100%);">
	<?php echo $this->element('navigationMenu'); ?>
	
    <div class="page-container <?php if(!empty($prefix) && $prefix == 'admin'){?>isAdmin<?php }?>">
        <?php echo $this->element('sidebarMenu'); ?>
        
        <div class="page-content-wrapper" style="margin-top: 29px;">
            <div class="page-content">
                <div class="animated fadeIn">
                <div class="page-bar">
                    <?php echo $this->element('breadcrumbs'); ?>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->Session->flash(); ?>
                    </div>
                </div>
                <!-- <div class="loader"></div> -->
                <?php echo $this->fetch('content'); ?>
                <!-- HIdden Notification -->
                
            </div>
        </div>
	</div>
    <div class="notification">
       
    </div>
    <div class="page-footer">
        <div class="page-footer-inner"> 
            <?php echo __('2023 &copy; Powered by') ?>
            <?php echo $this->Html->link(__('Puratech'), 'http://www.puratech.co.in/', ['target'=>'_blank']); 
                 // echo $this->AssetCompress->script('js-common');
                 // echo $this->AssetCompress->script('js-admin-theme');
                //  echo $this->Bs->script('js-common', ['defer'=>true]);
                // echo $this->Bs->script('js-admin-theme', ['defer'=>true]);
            ?>
        </div>
        <div class="scroll-to-top" style="display: block;">
            <?php echo $this->Bs->icon('angle-double-up'); 
                 
            ?>
        </div>
    </div>
    	
<span class="js">
    <?php
        echo $this->Bs->script('js-common', ['defer'=>true]);
        echo $this->Bs->script('js-admin-theme', ['defer'=>true]);
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
    <script type="text/javascript">
        var webrootUrl = <?php echo $this->webroot; ?>;
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <?php 
       //echo $this->Html->script("common.js");
       // echo $this->Html->script("jquery.blockui.min.js"); 
    ?>

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

 // $(document).on('click','#OpenImgUpload',(function () {
 //    alert('hi');
 // });

//  $('#OpenImgUpload').click(function(){
//      // $('#imgupload').trigger('click');
//     alert('hi');
// });

// imgupload.onchange = evt => {
//   const [file] = imgupload.files
//   if (file) {
//     blah.src = URL.createObjectURL(file)
//   }
// }  



/* $(document).on('keyup','input[type=text]',function(event) {
     if ($(this).attr('class').indexOf("urlinput") > -1){
        return false;
     }else{   
        var textBox = event.target;
        var start = textBox.selectionStart;
        var end = textBox.selectionEnd;
        textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1);
        textBox.setSelectionRange(start, end);
    }
   });*/

</script>