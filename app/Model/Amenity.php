<?php
App::uses('AppModel', 'Model');
/**
 * Amenity Model
 *
 * @property OurJourny $OurJourny
 */
class Amenity extends AppModel {

	public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'icon'
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
	public $order = array("Amenity.id"=>"ASC");
	
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'OurJourny' => array(
			'className' => 'OurJourny',
			'joinTable' => 'amenities_our_journies',
			'foreignKey' => 'amenity_id',
			'associationForeignKey' => 'our_journey_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);



}
