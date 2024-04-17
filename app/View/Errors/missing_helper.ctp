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
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$pluginDot = empty($plugin) ? null : $plugin . '.';
?>
<h2><?php echo __d('cake_dev', 'Missing Helper'); ?></h2>
<div class="alert alert-danger">
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', '%s could not be found.', '<em>' . h($pluginDot . $class) . '</em>'); ?>
</div>
<div class="alert alert-danger">
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', 'Create the class %s below in file: %s', '<em>' . h($class) . '</em>', (empty($plugin) ? APP_DIR . DS : CakePlugin::path($plugin)) . 'View' . DS . 'Helper' . DS . h($class) . '.php'); ?>
</div>
<pre>
<code class="language-php">
&lt;?php
class <?php echo h($class); ?> extends AppHelper {

}
</code>
</pre>

<?php echo $this->element('exception_stack_trace'); ?>
