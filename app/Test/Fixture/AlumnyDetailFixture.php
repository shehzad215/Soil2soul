<?php
/**
 * AlumnyDetailFixture
 *
 */
class AlumnyDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'alumny_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'feedback_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'alumny_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'alumny_id' => 1,
			'feedback_id' => 1,
			'alumny_type_id' => 1,
			'created' => '2022-10-27 11:25:33',
			'modified' => '2022-10-27 11:25:33'
		),
	);

}
