<?php
App::uses('AppModel', 'Model');
/**
 * OurWorkplace Model
 *
 */
class OurWorkplace extends AppModel {

		public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'small_image',
			'image'
		]
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("OurWorkplace.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


}
