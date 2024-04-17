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
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $cakeDescription ?></title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $this->Html->meta('icon');

        echo $this->Bs->css('css-common');
        echo $this->Bs->css('css-common-front');

        echo $this->fetch('meta');
        echo $this->fetch('css');

        echo $this->Bs->css('css-common-front-internal');
        echo $this->Html->css("colorbox/colorbox.css");
    ?>
    <?php echo $this->Bs->script('js-jquery'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5shiv.min', 'respond.min')); ?>
    <![endif]-->
</head>
<body>
    <div class="maiwrapper">
        <div class="container hidden-print">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth', array('element'=>'alerts', 'params'=>array('classType'=>'danger') )); ?>
        </div>
        <div class="container">
        <?php
            if(!empty($appMenuLinks) && $this->Session->check('Auth.User.id')) {
                ?>
                    <p class="hidden-print">&nbsp;</p>
                    <div class="row">
                        <div class="col-sm-3 hidden-print">
                            <div id="innerleftmenu">
                                <ul class="nav nav-pills nav-stacked" style="text-align: center;" >
                                    <?php 
                                      if(!empty($menuLinks)){
                                       echo $this->Bs->buildMenu($menuLinks, array('parentLiClass'=>'', 'parentChildUlClass'=>''));
                                      }
                                     ?>
                                </ul>
                            </div>
                            <p>&nbsp;</p>
                        </div>
                        <div class="col-sm-9">
                <?php } ?>
        
                <?php echo $this->fetch('content'); ?>

                <?php if(!empty($appMenuLinks)) { ?>
                        </div>
                    </div>
               
                <?php } ?>
         </div>
         </div>
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
</body>
</html>