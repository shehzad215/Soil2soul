<?php
App::uses('AppModel', 'Model');
/**
 * OurTeamsOurJourny Model
 *
 * @property OurTeam $OurTeam
 * @property OurJourney $OurJourney
 */
class OurTeamsOurJourny extends AppModel {

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
	public $order = array("OurTeamsOurJourny.id"=>"ASC");
	

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
		'OurJourney' => array(
			'className' => 'OurJourney',
			'foreignKey' => 'our_journey_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
