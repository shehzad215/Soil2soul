<?php
App::uses('AppModel', 'Model');
/**
 * AmenitiesOurJourny Model
 *
 * @property OurJourney $OurJourney
 * @property Amenity $Amenity
 */
class AmenitiesOurJourny extends AppModel {

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
		'OurJourney' => array(
			'className' => 'OurJourney',
			'foreignKey' => 'our_journey_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Amenity' => array(
			'className' => 'Amenity',
			'foreignKey' => 'amenity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
