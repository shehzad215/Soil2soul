<?php
/**
 * EventOrganizerDetailFixture
 *
 */
class EventOrganizerDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'event_organizer_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contact_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'designation' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'event_organizer_id' => 1,
			'department_id' => 1,
			'country_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'contact_no' => 'Lorem ipsum dolor sit amet',
			'designation' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-31 11:21:47',
			'modified' => '2017-08-31 11:21:47'
		),
	);

}
