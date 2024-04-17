<?php
App::uses('Timezone', 'Model');

/**
 * Timezone Test Case
 *
 */
class TimezoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.timezone',
		'app.country',
		'app.attraction_address',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.merchant_detail',
		'app.merchant_geolocation',
		'app.deal',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.social_profile',
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
		'app.attractions_facility',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.wishlist',
		'app.facility',
		'app.category',
		'app.categories_attraction',
		'app.user_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Timezone = ClassRegistry::init('Timezone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Timezone);

		parent::tearDown();
	}

}
