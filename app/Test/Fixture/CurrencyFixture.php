<?php
/**
 * CurrencyFixture
 *
 */
class CurrencyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iso_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iso_code_num' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sign' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'blank' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'format' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'decimals' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'conversion_rate' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '13,6', 'unsigned' => false),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'iso_code' => 'L',
			'iso_code_num' => 'L',
			'sign' => 'Lorem ',
			'blank' => 1,
			'format' => 1,
			'decimals' => 1,
			'conversion_rate' => '',
			'active' => 1,
			'created' => '2015-12-30 13:05:54',
			'modified' => '2015-12-30 13:05:54'
		),
	);

}
