<?php
/**
 * TourGlimpseFixture
 *
 */
class TourGlimpseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'our_journy_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amenity_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf32_general_ci', 'charset' => 'utf32'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf32', 'collate' => 'utf32_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'our_journy_id' => 1,
			'amenity_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'active' => 1,
			'created' => '2024-01-24 05:42:34',
			'modified' => '2024-01-24 05:42:34'
		),
	);

}
