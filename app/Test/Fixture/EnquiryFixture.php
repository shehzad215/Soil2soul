<?php
/**
 * EnquiryFixture
 *
 */
class EnquiryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'plan_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'team_members' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'plan_id' => 1,
			'location_id' => 1,
			'team_members' => 'Lorem ipsum dolor sit amet',
			'created' => '2023-11-27 05:03:48',
			'modified' => '2023-11-27 05:03:48'
		),
	);

}
