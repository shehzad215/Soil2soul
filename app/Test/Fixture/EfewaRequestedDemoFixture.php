<?php
/**
 * EfewaRequestedDemoFixture
 *
 */
class EfewaRequestedDemoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'city_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'product_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'designation' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'phone_calling_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'contact_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'company_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'company_website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'oprational_destinatoin' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'visitor_ip' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'visitor_country' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
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
			'country_id' => 1,
			'city_id' => 1,
			'product_name' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'designation' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone_calling_code' => 'Lorem ipsum dolor sit amet',
			'contact_no' => 'Lorem ipsum dolor sit amet',
			'company_name' => 'Lorem ipsum dolor sit amet',
			'company_website' => 'Lorem ipsum dolor sit amet',
			'oprational_destinatoin' => 'Lorem ipsum dolor sit amet',
			'visitor_ip' => 'Lorem ipsum dolor sit amet',
			'visitor_country' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-02-04 10:47:19',
			'modified' => '2022-02-04 10:47:19'
		),
	);

}
