<?php
/**
 * OrderAttractionRegularTimingFixture
 *
 */
class OrderAttractionRegularTimingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'order_attraction_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'week_day_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'opening_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'closing_time' => array('type' => 'time', 'null' => true, 'default' => null),
		'is_closed' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'order_id' => 1,
			'order_attraction_id' => 1,
			'week_day_id' => 1,
			'opening_time' => '06:16:56',
			'closing_time' => '06:16:56',
			'is_closed' => 1,
			'created' => '2016-01-12 06:16:56',
			'modified' => '2016-01-12 06:16:56'
		),
	);

}
