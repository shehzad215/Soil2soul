<?php
App::uses('AppModel', 'Model');
/**
 * Currency Model
 *
 * @property AttractionProductPrice $AttractionProductPrice
 * @property CartItem $CartItem
 * @property Markup $Markup
 * @property SpecificPrice $SpecificPrice
 */
class Currency extends AppModel {

	public $actsAs = array('Containable');

/**
 * Display Field rule
 *
 * @var array
 */
	public $displayField = 'title';

/**
 * Display Field rule
 *
 * @var array
 */
	public $virtualFields = [
		'title' => 'CONCAT(Currency.iso_code, " - ", Currency.name)'
	];

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("Currency.iso_code"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'iso_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Iso Code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'iso_code_num' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Iso Code Num',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blank' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Please enter a valid Blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'format' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Please enter a valid Format',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'conversion_rate' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Conversion Rate',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Please enter a valid Active',
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
		'OurJourny' => array(
			'className' => 'OurJourny',
			'foreignKey' => 'currency_id',
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
