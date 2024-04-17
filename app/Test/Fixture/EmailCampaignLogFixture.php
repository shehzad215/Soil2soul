<?php
/**
 * EmailCampaignLogFixture
 *
 */
class EmailCampaignLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'email_campaign_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'bounced' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'drop' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'permanent_fail' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'accepted' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'delivered' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'opened' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'clicked' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'unsubscribed' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'stored' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'vaccation_response' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'auto_response' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
		'positive_response' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12, 'unsigned' => true),
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
			'email_campaign_id' => 1,
			'bounced' => 1,
			'drop' => 1,
			'permanent_fail' => 1,
			'accepted' => 1,
			'delivered' => 1,
			'opened' => 1,
			'clicked' => 1,
			'unsubscribed' => 1,
			'stored' => 1,
			'vaccation_response' => 1,
			'auto_response' => 1,
			'positive_response' => 1,
			'created' => '2017-12-15 06:35:30',
			'modified' => '2017-12-15 06:35:30'
		),
	);

}
