<?php
App::uses('OrderProductPriceGroup', 'Model');

/**
 * OrderProductPriceGroup Test Case
 *
 */
class OrderProductPriceGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_product_price_group',
		'app.order',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.country',
		'app.zone',
		'app.country_detail',
		'app.attraction_address',
		'app.destination',
		'app.markup',
		'app.currency',
		'app.attraction_product_price',
		'app.attraction_product',
		'app.duration',
		'app.attraction_comment',
		'app.attraction_product_price_group',
		'app.cart_item',
		'app.cart',
		'app.nationality',
		'app.specific_price',
		'app.attraction_product_time_slot',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.user_detail',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.wishlist',
		'app.attraction_type',
		'app.featured_attraction',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.attraction_video',
		'app.category',
		'app.attractions_category',
		'app.facility',
		'app.attractions_facility',
		'app.order_product_price'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderProductPriceGroup = ClassRegistry::init('OrderProductPriceGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderProductPriceGroup);

		parent::tearDown();
	}

}
