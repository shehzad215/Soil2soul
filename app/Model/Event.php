<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property EventImage $EventImage
 */
class Event extends AppModel {

	public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'image_file'
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
	public $order = array("Event.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EventImage' => array(
			'className' => 'EventImage',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);



}
