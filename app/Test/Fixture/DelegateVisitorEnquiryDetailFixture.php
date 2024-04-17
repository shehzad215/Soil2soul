<?php
/**
 * DelegateVisitorEnquiryDetailFixture
 *
 */
class DelegateVisitorEnquiryDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'delegate_visitor_enquiry_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'event_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'enquiry_source_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'event_enquiry_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'event_attended_by' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'event_enq_created_on' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'partner_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'partner_created_on_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'partner_contact' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'partner_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email_marketing_campaign_id_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email_marketing_campaign_created_on' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'email_marketing_database_id_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email_marketing_database_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'email_marketing_design_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email_marketing_handled_by' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email_marketing_purpose' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telecalling_called_by' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telecalling_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'telecalling_database_id_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telecalling_purpose' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'website_enquiry_received_on' => array('type' => 'date', 'null' => true, 'default' => null),
		'website_enq_created_on' => array('type' => 'date', 'null' => true, 'default' => null),
		'reference_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reference_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reference_contact' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reference_created_on_date' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'delegate_visitor_enquiry_id' => 1,
			'event_id' => 1,
			'enquiry_source_type_id' => 1,
			'event_enquiry_type' => 'Lorem ipsum dolor sit amet',
			'event_attended_by' => 'Lorem ipsum dolor sit amet',
			'event_enq_created_on' => '2017-11-08 14:17:22',
			'partner_id' => 1,
			'partner_created_on_date' => '2017-11-08',
			'partner_contact' => 'Lorem ipsum dolor sit amet',
			'partner_email' => 'Lorem ipsum dolor sit amet',
			'email_marketing_campaign_id_no' => 'Lorem ipsum dolor sit amet',
			'email_marketing_campaign_created_on' => '2017-11-08 14:17:22',
			'email_marketing_database_id_no' => 'Lorem ipsum dolor sit amet',
			'email_marketing_database_date' => '2017-11-08',
			'email_marketing_design_no' => 'Lorem ipsum dolor sit amet',
			'email_marketing_handled_by' => 'Lorem ipsum dolor sit amet',
			'email_marketing_purpose' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'telecalling_called_by' => 'Lorem ipsum dolor sit amet',
			'telecalling_date' => '2017-11-08',
			'telecalling_database_id_no' => 'Lorem ipsum dolor sit amet',
			'telecalling_purpose' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'website_enquiry_received_on' => '2017-11-08',
			'website_enq_created_on' => '2017-11-08',
			'reference_name' => 'Lorem ipsum dolor sit amet',
			'reference_email' => 'Lorem ipsum dolor sit amet',
			'reference_contact' => 'Lorem ipsum dolor sit amet',
			'reference_created_on_date' => '2017-11-08',
			'created' => '2017-11-08 14:17:22',
			'modified' => '2017-11-08 14:17:22'
		),
	);

}
