<?php
App::uses('AppModel', 'Model');
/**
 * OurScholarDetail Model
 *
 * @property OurJourny $OurJourny
 * @property OurTeam $OurTeam
 */
class OurScholarDetail extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	public $order = array("OurScholarDetail.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'our_journy_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'our_team_id' => array(
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
		'OurJourny' => array(
			'className' => 'OurJourny',
			'foreignKey' => 'our_journy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OurTeam' => array(
			'className' => 'OurTeam',
			'foreignKey' => 'our_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
