<?php
/**
 * DoctorsAgeGroupFixture
 *
 */
class DoctorsAgeGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'doctor_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'age_group_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'doctor_id' => 1,
			'age_group_id' => 1,
			'created' => '2023-02-13 05:01:19',
			'modified' => '2023-02-13 05:01:19'
		),
	);

}
