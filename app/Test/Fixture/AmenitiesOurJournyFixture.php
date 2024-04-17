<?php
/**
 * AmenitiesOurJournyFixture
 *
 */
class AmenitiesOurJournyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'our_journey_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amenity_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf32', 'collate' => 'utf32_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'our_journey_id' => 1,
			'amenity_id' => 1
		),
	);

}
