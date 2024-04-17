<?php
/**
 * CrmQuoteProceseFixture
 *
 */
class CrmQuoteProceseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'crm_quote_request_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'booking_portal_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'booking_proces_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'crm_quote_request_id' => 1,
			'booking_portal_id' => 1,
			'booking_proces_id' => 1,
			'active' => 1,
			'created' => '2021-12-16 06:58:33',
			'modified' => '2021-12-16 06:58:33'
		),
	);

}
