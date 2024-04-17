<?php
App::uses('Nationality', 'Model');

/**
 * Nationality Test Case
 *
 */
class NationalityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nationality',
		'app.country',
		'app.zone',
		'app.country_detail',
		'app.attraction_address',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.salutation',
		'app.attraction_enquiry',
		'app.attraction_product',
		'app.attraction_comment',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.currency',
		'app.markup',
		'app.specific_price',
		'app.cart_item',
		'app.cart',
		'app.attraction_product_time_slot',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.attraction_product_cancellation_policy',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.user_detail',
		'app.marital_status',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.wishlist',
		'app.temp_order',
		'app.destination',
		'app.destination_api_map',
		'app.order_attraction',
		'app.order',
		'app.order_attraction_address',
		'app.order_attraction_contact',
		'app.order_attraction_product',
		'app.order_attraction_product_pickup_point',
		'app.order_attraction_product_price_group',
		'app.order_attraction_product_price',
		'app.order_passenger',
		'app.order_attraction_product_time_slot',
		'app.order_attraction_product_cancellation_policy',
		'app.order_attraction_regular_timing',
		'app.week_day',
		'app.attraction_regular_timing',
		'app.order_attraction_closed_date',
		'app.order_attraction_type',
		'app.facility',
		'app.attractions_facility',
		'app.order_attractions_facility',
		'app.attraction_type',
		'app.featured_attraction',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_video',
		'app.attraction_closed_date',
		'app.category',
		'app.category_api_map',
		'app.attractions_category',
		'app.attraction_product_prices_nationality'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nationality = ClassRegistry::init('Nationality');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nationality);

		parent::tearDown();
	}

}
