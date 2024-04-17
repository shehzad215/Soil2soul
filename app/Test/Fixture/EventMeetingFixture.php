<?php
/**
 * EventMeetingFixture
 *
 */
class EventMeetingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'user_activation_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'event_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'booth_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'party_booth_zone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'start_time' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'end_time' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'is_after_event' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contact_person' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mobile_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'event_id' => 1,
			'user_activation_detail_id' => 1,
			'event_date' => '2017-08-16',
			'booth_no' => 'Lorem ipsum dolor sit amet',
			'party_booth_zone' => 'Lorem ipsum dolor sit amet',
			'start_time' => 'Lorem ipsum dolor sit amet',
			'end_time' => 'Lorem ipsum dolor sit amet',
			'is_after_event' => 1,
			'company_name' => 'Lorem ipsum dolor sit amet',
			'contact_person' => 'Lorem ipsum dolor sit amet',
			'company_url' => 'Lorem ipsum dolor sit amet',
			'country_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile_no' => 'Lorem ipsum d',
			'created' => '2017-08-16 11:54:22',
			'modified' => '2017-08-16 11:54:22'
		),
	);

}
