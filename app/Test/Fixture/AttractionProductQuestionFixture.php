<?php
/**
 * AttractionProductQuestionFixture
 *
 */
class AttractionProductQuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'attraction_product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'question' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'attraction_product_id' => 1,
			'question' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-12-27 06:39:07',
			'modified' => '2016-12-27 06:39:07'
		),
	);

}
