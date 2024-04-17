<?php
/**
 * ExaminationsResultFixture
 *
 */
class ExaminationsResultFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'academic_year_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'exam_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'course_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'exam_month' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'link' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created_by_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'academic_year_id' => 1,
			'exam_type_id' => 1,
			'course_id' => 1,
			'exam_month' => 'Lorem ipsum dolor sit amet',
			'link' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'created_by_id' => 1,
			'created' => '2022-12-02 07:16:47',
			'modified' => '2022-12-02 07:16:47'
		),
	);

}
