<?php
/**
 * MarketNewsFixture
 *
 */
class MarketNewsFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'supplier_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true),
		'competitor_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true),
		'news_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'supplier_id' => 1,
			'competitor_id' => 1,
			'news_date' => '2017-07-15',
			'description' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'created' => '2017-07-15 09:26:00',
			'modified' => '2017-07-15 09:26:00',
			'created_by' => 1,
			'updated_by' => 1
		),
	);

}
