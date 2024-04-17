<?php
App::uses('AppModel', 'Model');
/**
 * TourCostDetail Model
 *
 * @property OurJourny $OurJourny
 * @property TourCost $TourCost
 * @property TourCostType $TourCostType
 */
class TourCostDetail extends AppModel {

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
	public $order = array("TourCostDetail.id"=>"ASC");
	
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
		'tour_cost_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid tour_cost_id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tour_cost_type_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid tour_cost_type_id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'currency_id' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		'message' => 'Please enter a valid currency_id',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'price' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		'message' => 'Please enter a valid price',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
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
		'TourCost' => array(
			'className' => 'TourCost',
			'foreignKey' => 'tour_cost_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TourCostType' => array(
			'className' => 'TourCostType',
			'foreignKey' => 'tour_cost_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Currency' => array(
			'className' => 'Currency',
			'foreignKey' => 'currency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
