<?php
App::uses('AppModel', 'Model');
/**
 * OurJourneyItenery Model
 *
 * @property OurJourny $OurJourny
 */
class OurJourneyItenery extends AppModel {

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
	public $order = array("OurJourneyItenery.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
/*		'day' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid day',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OurJourny' => array(
			'className' => 'OurJourny',
			'foreignKey' => 'our_journy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
