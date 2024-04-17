<?php
/**
 * OrderCancellationFixture
 *
 */
class OrderCancellationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'order_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'order_placed_on' => array('type' => 'date', 'null' => false, 'default' => null),
		'date_of_cancellation' => array('type' => 'date', 'null' => false, 'default' => null),
		'travel_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'days_before_cancellation' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'currency_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'cancellation_deductions_percent' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'total_deductions' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'refund_value' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
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
			'order_detail_id' => 1,
			'order_placed_on' => '2016-09-19',
			'date_of_cancellation' => '2016-09-19',
			'travel_date' => '2016-09-19',
			'days_before_cancellation' => 1,
			'currency_id' => 1,
			'cancellation_deductions_percent' => '',
			'total_deductions' => '',
			'refund_value' => '',
			'created' => '2016-09-19 06:31:48',
			'modified' => '2016-09-19 06:31:48'
		),
	);

}
