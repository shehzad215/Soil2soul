<?php
App::uses('AppModel', 'Model');
/**
 * Salutation Model
 *
 * @property User $User
 */
class Salutation extends AppModel {

	public $actsAs = array('Containable');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("Salutation.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid title',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'salutation_id',
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
