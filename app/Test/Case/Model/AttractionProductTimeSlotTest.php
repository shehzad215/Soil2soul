<?php
App::uses('AttractionProductTimeSlot', 'Model');

/**
 * AttractionProductTimeSlot Test Case
 *
 */
class AttractionProductTimeSlotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_product_time_slot',
		'app.attraction_product',
		'app.attraction',
		'app.duration',
		'app.attraction_comment',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.user',
		'app.nationality',
		'app.currency',
		'app.order_tax',
		'app.tax_type',
		'app.markup',
		'app.tag',
		'app.attraction_products_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionProductTimeSlot = ClassRegistry::init('AttractionProductTimeSlot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionProductTimeSlot);

		parent::tearDown();
	}

}
