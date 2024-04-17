<?php
App::uses('AppModel', 'Model');
/**
 * OurTeamsOurTeamType Model
 *
 * @property OurTeam $OurTeam
 * @property OurTeamType $OurTeamType
 */
class OurTeamsOurTeamType extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	public $order = array();
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OurTeam' => array(
			'className' => 'OurTeam',
			'foreignKey' => 'our_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OurTeamType' => array(
			'className' => 'OurTeamType',
			'foreignKey' => 'our_team_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
