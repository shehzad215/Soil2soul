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
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $smtp = array(
		'transport' => 'Mail',
		'from' => array('smtp.gmail.com' => 'efewa.com'),
		'replyTo' => 'no-reply@efewa.com',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);
	
	public $gmail = array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'wasim@puratech.co.in',
        'password' => 'Pura@waseem',
        'transport' => 'Smtp'
    );

	public $default = array(
		'transport' => 'Smtp',
		'from' => array('info@soil2soulexpeditions.com' => 'Soil 2 Soul : EXPEDITIONS'),
		'host' => '64.90.62.162',
		'port' => 587,
		'timeout' => 60,
		'username' => 'info@soil2soulexpeditions.com',
		'password' => '71&b4mdw',
		'client' => null,
		'log' => true,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	// public $default = array(
	// 	'transport' => 'Smtp',
	// 	'from' => array('test@epuratech.com' => 'Community Coworks'),
	// 	'host' => '180.149.240.236',
	// 	'port' => 587,
	// 	'timeout' => 30,
	// 	'username' => 'test@epuratech.com',
	// 	'password' => 'tes123',
	// 	'client' => null,
	// 	'log' => true,
	// 	'charset' => 'utf-8',
	// 	'headerCharset' => 'utf-8',
	// );

	
	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => '	',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
