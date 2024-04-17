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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!-- <h2><?php //echo $message; ?></h2> -->
<!-- <p class="error">
	<strong><?php //echo __d('cake', 'Error'); ?>: </strong>
	<?php 
	// printf(
	// 	__d('cake', 'The requested address %s was not found on this server.'),
	// 	"<strong>'{$url}'</strong>"
	// );
	?>
</p> -->
<style type="text/css">
	.textorange13{
	    text-align: center;
	    font-weight: 700;
	}
</style>
<div class="container">
<div class="contentarea">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 text-center"> <?php echo $this->Html->image("404.jpg", ['escape'=>false, 'alt' => '404']);?></div>
<div class="col-md-4"></div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4" style="margin-top: 45px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
     <!--  <td width="70" class="textorange22boldprice">Error:</td> -->
      <td class="textorange13">Sorry, the page you requested could not be found!</td>
    </tr>
  </tbody>
</table>

</div>
<div class="col-md-4"></div>
</div>

<!-- <div class="row">
<div class="col-md-12 textgray13cont text-center"><span class="textorange13"><a href="<?php //echo Router::url('/', true);?>">click here</a></span> to go to our home page.
</div> -->
</div>

</div>
</div>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
<script type="text/javascript">
  $(function() {
   document.title = "404 - Soil2Soul : Explore India's Sacred Places with Soil2Soul Expeditions";   
<?php $this->end(); ?>
});
</script>
