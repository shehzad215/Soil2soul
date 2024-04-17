<?php
/**
 * AgentSecurityPaymentFixture
 *
 */
class AgentSecurityPaymentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'currency_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'amount' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'is_applicable' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'is_payment_received' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'received_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'is_payment_returned' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'user_id' => 1,
			'currency_id' => 1,
			'amount' => '',
			'is_applicable' => 1,
			'is_payment_received' => 1,
			'received_date' => '2017-02-06',
			'is_payment_returned' => 1,
			'active' => 1,
			'created' => '2017-02-06 10:05:36',
			'modified' => '2017-02-06 10:05:36'
		),
	);

}
