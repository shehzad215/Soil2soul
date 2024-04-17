<?php
App::uses('AppModel', 'Model');
/**
 * LocationImage Model
 *
 * @property Location $Location
 */
class LocationImage extends AppModel {

	public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'image'
		]
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("LocationImage.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

		'order' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Order',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username already present.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
