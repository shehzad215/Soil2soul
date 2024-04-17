<?php
/**
 * CartItemFixture
 *
 */
class CartItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'cart_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'attraction_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'attraction_product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'attraction_product_price_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'attraction_product_price_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'travel_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'nationality_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'qty' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'attraction_product_time_slot_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true),
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
			'cart_id' => 1,
			'attraction_id' => 1,
			'attraction_product_id' => 1,
			'attraction_product_price_group_id' => 1,
			'attraction_product_price_id' => 1,
			'travel_date' => '2016-01-09',
			'nationality_id' => 1,
			'qty' => 1,
			'attraction_product_time_slot_id' => 1,
			'created' => '2016-01-09 10:42:28',
			'modified' => '2016-01-09 10:42:28'
		),
	);

}
