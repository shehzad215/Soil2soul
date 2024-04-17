<?php
App::uses('AttractionProductsTag', 'Model');

/**
 * AttractionProductsTag Test Case
 *
 */
class AttractionProductsTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_products_tag',
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
		'app.attraction_product_time_slot',
		'app.markup',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionProductsTag = ClassRegistry::init('AttractionProductsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionProductsTag);

		parent::tearDown();
	}

}
