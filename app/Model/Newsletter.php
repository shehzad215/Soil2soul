<?php
App::uses('AppModel', 'Model');
/**
 * Newsletter Model
 *
 */
class Newsletter extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	public $order = array('Newsletter.id'=>'DESC');
	


}
