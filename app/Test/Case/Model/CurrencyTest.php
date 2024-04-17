<?php
App::uses('Currency', 'Model');

/**
 * Currency Test Case
 *
 */
class CurrencyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.currency',
		'app.attraction_product_price',
		'app.attraction_product',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.country',
		'app.country_detail',
		'app.attraction_address',
		'app.destination',
		'app.markup',
		'app.nationality',
		'app.user_detail',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.wishlist',
		'app.cart',
		'app.cart_item',
		'app.attraction_comment',
		'app.attraction_type',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.attraction_video',
		'app.specific_price',
		'app.attraction_product_price_group',
		'app.category',
		'app.attractions_category',
		'app.facility',
		'app.attractions_facility',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.duration',
		'app.attraction_product_time_slot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Currency = ClassRegistry::init('Currency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Currency);

		parent::tearDown();
	}

}
