<?php
/**
 * DealCouponFixture
 *
 */
class DealCouponFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'deal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'coupon_code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'validity_start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'validity_end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'utilization_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'deal_id' => 1,
			'coupon_code' => 'Lorem ipsum dolor sit amet',
			'validity_start_date' => '2015-09-24',
			'validity_end_date' => '2015-09-24',
			'utilization_date' => '2015-09-24',
			'created' => '2015-09-24 04:57:50',
			'modified' => '2015-09-24 04:57:50'
		),
	);

}
