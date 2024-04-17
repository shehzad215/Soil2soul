<?php
/**
 * TeachingPublicationFixture
 *
 */
class TeachingPublicationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'career_teaching_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'book_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modifed' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_0900_ai_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'career_teaching_id' => 1,
			'book_name' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-09-09 06:14:52',
			'modifed' => '2022-09-09 06:14:52'
		),
	);

}
