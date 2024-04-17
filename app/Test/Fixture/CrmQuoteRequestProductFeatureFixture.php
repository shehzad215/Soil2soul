<?php
/**
 * CrmQuoteRequestProductFeatureFixture
 *
 */
class CrmQuoteRequestProductFeatureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'crm_quote_request_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'product_feature_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'product_feature_id' => 1
		),
	);

}
