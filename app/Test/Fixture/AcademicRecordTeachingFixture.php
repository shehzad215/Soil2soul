<?php
/**
 * AcademicRecordTeachingFixture
 *
 */
class AcademicRecordTeachingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'mode_of_study_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'career_teaching_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'examination_passed' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'name_location_of_school' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'university' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'month_year_pasing' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'subject_specialisation' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'percentage_marks_obtained' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
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
			'mode_of_study_id' => 1,
			'career_teaching_id' => 1,
			'examination_passed' => 'Lorem ipsum dolor sit amet',
			'name_location_of_school' => 'Lorem ipsum dolor sit amet',
			'university' => 'Lorem ipsum dolor sit amet',
			'month_year_pasing' => 'Lorem ipsum dolor sit amet',
			'subject_specialisation' => 'Lorem ipsum dolor sit amet',
			'percentage_marks_obtained' => 'Lorem ipsum dolor sit amet',
			'certificates' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-09-09 05:04:06',
			'modified' => '2022-09-09 05:04:06'
		),
	);

}
