<?php
App::uses('AppModel', 'Model');
/**
 * OurTeam Model
 *
 * @property OurJourny $OurJourny
 */
class OurTeam extends AppModel {

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
	public $order = array("OurTeam.order"=>"ASC");
	
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
		'order' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Order',
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
		'OurScholarDetail' => array(
			'className' => 'OurScholarDetail',
			'foreignKey' => 'our_team_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'OurJourny' => array(
			'className' => 'OurJourny',
			'joinTable' => 'our_teams_our_journies',
			'foreignKey' => 'our_team_id',
			'associationForeignKey' => 'our_journey_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	 'OurTeamType' => array(
		'className' => 'OurTeamType',
		'joinTable' => 'our_teams_our_team_types',
		'foreignKey' => 'our_team_id',
		'associationForeignKey' => 'our_team_type_id',
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
