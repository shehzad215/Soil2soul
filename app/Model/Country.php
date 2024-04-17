<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property Zone $Zone
 * @property AttractionAddress $AttractionAddress
 * @property Attraction $Attraction
 * @property CountryDetail $CountryDetail
 * @property Destination $Destination
 * @property Markup $Markup
 * @property Nationality $Nationality
 * @property SpecificPrice $SpecificPrice
 * @property Timezone $Timezone
 * @property UserDetail $UserDetail
 * @property User $User
 */
class Country extends AppModel {

	public $actsAs = array('Containable',
		'Upload.Upload'=>['attachment_file']
		);

	public $virtualFields = array(
		'country_with_calling_code' => 'CONCAT(Country.name, " (+", Country.calling_code,")")'
	);
/**
 * Order rule
 *
 * @var array
 */
	public $order = array("TRIM(Country.name)"=>"ASC");
	
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
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Country Name is already exist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alpha_2_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Alpha 2 Code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)/*,
		'alpha_3_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Alpha 3 Code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)*/,
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
		'Enquiry' => array(
			'className' => 'Enquiry',
			'foreignKey' => 'country_id',
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
