<?php
/**
 * PlacemenPictureFixture
 *
 */
class PlacemenPictureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'placement_cell_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'image_file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'placement_cell_id' => 1,
			'image_file' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'created' => '2022-08-11 08:03:57',
			'modified' => '2022-08-11 08:03:57'
		),
	);

}
