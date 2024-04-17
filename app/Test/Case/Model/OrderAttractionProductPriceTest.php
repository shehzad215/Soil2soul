<?php
App::uses('OrderAttractionProductPrice', 'Model');

/**
 * OrderAttractionProductPrice Test Case
 *
 */
class OrderAttractionProductPriceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_attraction_product_price',
		'app.order',
		'app.order_attraction_product',
		'app.order_attraction_product_price_group',
		'app.order_specific_price',
		'app.user',
		'app.nationality',
		'app.country',
		'app.zone',
		'app.country_detail',
		'app.attraction_address',
		'app.attraction',
		'app.destination',
		'app.attraction_type',
		'app.featured_attraction',
		'app.attraction_comment',
		'app.attraction_product',
		'app.duration',
		'app.currency',
		'app.attraction_product_price',
		'app.attraction_product_price_group',
		'app.cart_item',
		'app.cart',
		'app.attraction_product_time_slot',
		'app.specific_price',
		'app.markup',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.attraction_video',
		'app.wishlist',
		'app.category',
		'app.attractions_category',
		'app.facility',
		'app.attractions_facility',
		'app.timezone',
		'app.user_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderAttractionProductPrice = ClassRegistry::init('OrderAttractionProductPrice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderAttractionProductPrice);

		parent::tearDown();
	}

}
