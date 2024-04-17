<?php
/**
 * EnquirySourceTypeDetailFixture
 *
 */
class EnquirySourceTypeDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'enquiry_source_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'field_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'field_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'placeholder' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'display_field' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'is_mandatory' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'enquiry_source_type_id' => 1,
			'field_name' => 'Lorem ipsum dolor sit amet',
			'field_type' => 'Lorem ipsum dolor sit amet',
			'placeholder' => 'Lorem ipsum dolor sit amet',
			'display_field' => 'Lorem ipsum dolor sit amet',
			'is_mandatory' => 1,
			'created' => '2022-07-25 12:36:24',
			'modified' => '2022-07-25 12:36:24'
		),
	);

}
