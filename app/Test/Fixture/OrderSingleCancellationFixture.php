<?php
/**
 * OrderSingleCancellationFixture
 *
 */
class OrderSingleCancellationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'order_passenger_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'order_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'order_placed_on' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_of_cancellation' => array('type' => 'date', 'null' => true, 'default' => null),
		'travel_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'days_before_cancellation' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'currency_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'cancellation_deductions_percent' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'total_deductions' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'refund_value' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'order_passenger_id' => 1,
			'order_detail_id' => 1,
			'order_placed_on' => '2016-09-29',
			'date_of_cancellation' => '2016-09-29',
			'travel_date' => '2016-09-29',
			'days_before_cancellation' => 1,
			'currency_id' => 1,
			'cancellation_deductions_percent' => 'Lorem ipsum dolor sit amet',
			'total_deductions' => 'Lorem ipsum dolor sit amet',
			'refund_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-29 06:44:18',
			'modified' => '2016-09-29 06:44:18'
		),
	);

}
