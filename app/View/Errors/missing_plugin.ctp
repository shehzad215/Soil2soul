<?php
/**
 *
 * PHP 5
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
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo __d('cake_dev', 'Missing Plugin'); ?></h2>
<div class="alert alert-danger">
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', 'The application is trying to load a file from the %s plugin', '<em>' . h($plugin) . '</em>'); ?>
</div>
<div class="alert alert-danger">
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', 'Make sure your plugin %s is in the ' . APP_DIR . DS . 'Plugin directory and was loaded', $plugin); ?>
</div>
<pre>
<code class="language-php">
&lt;?php
CakePlugin::load('<?php echo h($plugin); ?>');

</code>
</pre>
<div class="alert alert-info">
	<strong><?php echo __d('cake_dev', 'Loading all plugins'); ?>: </strong>
	<?php echo __d('cake_dev', 'If you wish to load all plugins at once, use the following line in your ' . APP_DIR . DS . 'Config' . DS . 'bootstrap.php file'); ?>
</div>
<pre>
<code class="language-php">
CakePlugin::loadAll();
</code>
</pre>

<?php echo $this->element('exception_stack_trace'); ?>
