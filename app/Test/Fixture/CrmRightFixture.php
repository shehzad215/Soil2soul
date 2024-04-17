<?php
/**
 * CrmRightFixture
 *
 */
class CrmRightFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'show_contact' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'create_contact' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_contact' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_contact' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'show_pre_enquiry' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'create_pre_enquiry' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_pre_enquiry' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_pre_enquiry' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'show_lead' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_lead' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_lead' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'show_quote' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_quote' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_quote' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'show_sales' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_sales' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_sales' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'show_lost' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'view_lost' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'edit_lost' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
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
			'show_contact' => 1,
			'create_contact' => 1,
			'view_contact' => 1,
			'edit_contact' => 1,
			'show_pre_enquiry' => 1,
			'create_pre_enquiry' => 1,
			'view_pre_enquiry' => 1,
			'edit_pre_enquiry' => 1,
			'show_lead' => 1,
			'view_lead' => 1,
			'edit_lead' => 1,
			'show_quote' => 1,
			'view_quote' => 1,
			'edit_quote' => 1,
			'show_sales' => 1,
			'view_sales' => 1,
			'edit_sales' => 1,
			'show_lost' => 1,
			'view_lost' => 1,
			'edit_lost' => 1,
			'created' => '2017-12-28 14:33:05',
			'modified' => '2017-12-28 14:33:05'
		),
	);

}
