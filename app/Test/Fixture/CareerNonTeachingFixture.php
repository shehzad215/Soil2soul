<?php
/**
 * CareerNonTeachingFixture
 *
 */
class CareerNonTeachingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'apply_post_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'surname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'father_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'mother_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'post' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'date_of_birth' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'age' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'marital_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'please_specify' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'wedding_anniversary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'husbend_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'occupation' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'address_for_communication' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'permanent_address' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'pincode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'mobile' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'current_salary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
		'expected_salary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
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
			'apply_post_id' => 1,
			'surname' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'father_name' => 'Lorem ipsum dolor sit amet',
			'mother_name' => 'Lorem ipsum dolor sit amet',
			'post' => 'Lorem ipsum dolor sit amet',
			'date_of_birth' => 'Lorem ipsum dolor sit amet',
			'age' => 'Lorem ipsum dolor sit amet',
			'marital_status' => 'Lorem ipsum dolor sit amet',
			'please_specify' => 'Lorem ipsum dolor sit amet',
			'wedding_anniversary' => 'Lorem ipsum dolor sit amet',
			'husbend_name' => 'Lorem ipsum dolor sit amet',
			'occupation' => 'Lorem ipsum dolor sit amet',
			'address_for_communication' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'permanent_address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pincode' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'current_salary' => 'Lorem ipsum dolor sit amet',
			'expected_salary' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-08-05 09:38:03',
			'modified' => '2022-08-05 09:38:03'
		),
	);

}
