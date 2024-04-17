<?php
App::uses('PaymentStatus', 'Model');

/**
 * PaymentStatus Test Case
 *
 */
class PaymentStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_status',
		'app.user_subscription_payment',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.country',
		'app.attraction_address',
		'app.attraction',
		'app.destination',
		'app.attraction_type',
		'app.attraction_comment',
		'app.attraction_product',
		'app.duration',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.nationality',
		'app.currency',
		'app.markup',
		'app.attraction_product_time_slot',
		'app.tag',
		'app.attraction_products_tag',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.wishlist',
		'app.facility',
		'app.attractions_facility',
		'app.attractions_tag',
		'app.category',
		'app.categories_attraction',
		'app.user_detail',
		'app.merchant_detail',
		'app.merchant_geolocation',
		'app.deal',
		'app.user_subscription',
		'app.subscription_plan',
		'app.social_profile',
		'app.payment_method'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentStatus = ClassRegistry::init('PaymentStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentStatus);

		parent::tearDown();
	}

}
