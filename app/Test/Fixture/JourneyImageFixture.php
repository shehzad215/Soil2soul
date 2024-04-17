<?php
/**
 * JourneyImageFixture
 *
 */
class JourneyImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'our_journy_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'order' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'image_file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'its_main_image' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf32', 'collate' => 'utf32_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'our_journy_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 'L',
			'image_file' => 'Lorem ipsum dolor sit amet',
			'its_main_image' => 1,
			'active' => 1,
			'created' => '2024-01-15 11:55:14',
			'modified' => '2024-01-15 11:55:14'
		),
	);

}
