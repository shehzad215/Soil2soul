<?php
/**
 * AcademicRecordFixture
 *
 */
class AcademicRecordFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'career_non_teaching_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name_location_of_school' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'board_university' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'examination_passed' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'year_of_passing' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'main_subject' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'mark' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'certificates' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'career_non_teaching_id' => 1,
			'name_location_of_school' => 'Lorem ipsum dolor sit amet',
			'board_university' => 'Lorem ipsum dolor sit amet',
			'examination_passed' => 'Lorem ipsum dolor sit amet',
			'year_of_passing' => 'Lorem ipsum dolor sit amet',
			'main_subject' => 'Lorem ipsum dolor sit amet',
			'mark' => 'Lorem ipsum dolor sit amet',
			'certificates' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-08-05 09:45:01',
			'modified' => '2022-08-05 09:45:01'
		),
	);

}
