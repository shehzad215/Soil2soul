<?php
App::uses('OrderAttractionProductPriceGroup', 'Model');

/**
 * OrderAttractionProductPriceGroup Test Case
 *
 */
class OrderAttractionProductPriceGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_attraction_product_price_group',
		'app.order',
		'app.order_attraction_product',
		'app.order_attraction_product_price',
		'app.order_specific_price'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderAttractionProductPriceGroup = ClassRegistry::init('OrderAttractionProductPriceGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderAttractionProductPriceGroup);

		parent::tearDown();
	}

}
