<?php
/**
 * OurJourneyDepartureFixture
 *
 */
class OurJourneyDepartureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'our_journy_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'no_of_seats' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'pending_seats' => array('type' => 'string', 'null' => true, 'default' => '0', 'length' => 45, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'our_journy_id' => 1,
			'date' => 'Lorem ipsum dolor sit amet',
			'no_of_seats' => 'Lorem ipsum dolor sit amet',
			'pending_seats' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'created' => '2024-01-16 05:47:54',
			'modified' => '2024-01-16 05:47:54'
		),
	);

}
