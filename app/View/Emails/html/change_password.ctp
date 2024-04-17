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
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php
$pieces = parse_url(Router::url('/', true)); 
$host = Router::getRequest(true)->host();
?>
<html>
<body>
<p style="font-size: 12px !important;font-family: calibri;">Dear <?php echo $usersData['User']['name'];?></p>
<p style="font-size: 12px !important;font-family: calibri;">The Password has been changed for you.</p>
<p style="font-size: 12px !important;font-family: calibri;"><b>URL: </b><?php echo $pieces['scheme'].'://'.$host.''.$this->webroot.'users/login';?></p>
<p style="font-size: 12px !important;font-family: calibri;"><b>Username: </b><?php echo $usersData['User']['username'];?></p>
<p style="font-size: 12px !important;font-family: calibri;"><b>New Password: </b><?php echo $usersData['User']['new_password'];?></p>
<p style="font-size: 12px !important;font-family: calibri;">Regards,<br>
eFEWA Team</p>
</body>
</html>
