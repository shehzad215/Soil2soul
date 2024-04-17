<?php
/**
 * AttractionRegularTimingFixture
 *
 */
class AttractionRegularTimingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'attraction_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'week_day_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'opening_time' => array('type' => 'time', 'null' => false, 'default' => null),
		'closing_time' => array('type' => 'time', 'null' => false, 'default' => null),
		'is_closed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'attraction_id' => 1,
			'week_day_id' => 1,
			'opening_time' => '08:48:03',
			'closing_time' => '08:48:03',
			'is_closed' => 1,
			'created' => '2015-12-09 08:48:03',
			'modified' => '2015-12-09 08:48:03'
		),
	);

}
