<?php
App::uses('AppModel', 'Model');
/**
 * LocationsAmenity Model
 *
 * @property Location $Location
 * @property Amenity $Amenity
 */
class LocationsAmenity extends AppModel {

	public $actsAs = array('Containable');
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
	public $order = array("LocationsAmenity.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
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
		),
		'Amenity' => array(
			'className' => 'Amenity',
			'foreignKey' => 'amenity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
