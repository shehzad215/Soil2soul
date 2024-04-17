<?php
/**
 * OrderAttractionProductPriceFixture
 *
 */
class OrderAttractionProductPriceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'order_attraction_product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'order_attraction_product_price_group_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'nationality_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'currency_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'original_price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'start_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'max_quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'max_product_booking_allowed_per_day' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
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
			'order_attraction_product_id' => 1,
			'order_attraction_product_price_group_id' => 1,
			'supplier_id' => 1,
			'nationality_id' => 1,
			'currency_id' => 1,
			'original_price' => '',
			'start_datetime' => '2016-01-12 06:13:02',
			'end_datetime' => '2016-01-12 06:13:02',
			'max_quantity' => 1,
			'max_product_booking_allowed_per_day' => 1,
			'created' => '2016-01-12 06:13:02',
			'modified' => '2016-01-12 06:13:02'
		),
	);

}
