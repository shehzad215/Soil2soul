<?php
App::uses('AppModel', 'Model');
/**
 * TourCost Model
 *
 * @property OurJourny $OurJourny
 * @property TourCostType $TourCostType
 */
class TourCost extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	public $order = array("TourCost.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'our_journy_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid our_journy_id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_seats' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid no_of_seats',
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
		'OurJourny' => array(
			'className' => 'OurJourny',
			'foreignKey' => 'our_journy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);


/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
    	'TourCostDetail' => array(
			'className' => 'TourCostDetail',
			'foreignKey' => 'tour_cost_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
