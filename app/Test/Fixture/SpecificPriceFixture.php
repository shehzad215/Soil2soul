<?php
/**
 * SpecificPriceFixture
 *
 */
class SpecificPriceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'attraction_product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'attraction_product_price_group_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'attraction_product_price_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'currency_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'nationality_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'from_quantity' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'reduction_value' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'is_percentage' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'from_datetime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'to_datetime' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'attraction_product_id' => 1,
			'attraction_product_price_group_id' => 1,
			'attraction_product_price_id' => 1,
			'currency_id' => 1,
			'country_id' => 1,
			'nationality_id' => 1,
			'price' => '',
			'from_quantity' => 1,
			'reduction_value' => '',
			'is_percentage' => 1,
			'from_datetime' => '2015-12-30 13:01:01',
			'to_datetime' => '2015-12-30 13:01:01',
			'created' => '2015-12-30 13:01:01',
			'modified' => '2015-12-30 13:01:01'
		),
	);

}
