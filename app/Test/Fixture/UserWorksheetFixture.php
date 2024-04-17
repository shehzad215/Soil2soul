<?php
/**
 * UserWorksheetFixture
 *
 */
class UserWorksheetFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'enquiry_source_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'market_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'state_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'city_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'company_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'contact_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'designation' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'mobile_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'skype' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'remark' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
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
			'user_id' => 1,
			'enquiry_source_type_id' => 1,
			'market_id' => 1,
			'country_id' => 1,
			'state_id' => 1,
			'city_id' => 1,
			'company_name' => 'Lorem ipsum dolor sit amet',
			'company_url' => 'Lorem ipsum dolor sit amet',
			'contact_name' => 'Lorem ipsum dolor sit amet',
			'designation' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile_no' => 'Lorem ipsum dolor sit amet',
			'skype' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit amet',
			'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2021-07-29 04:50:46',
			'modified' => '2021-07-29 04:50:46'
		),
	);

}
