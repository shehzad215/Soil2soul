<?php
App::uses('Markup', 'Model');

/**
 * Markup Test Case
 *
 */
class MarkupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.markup',
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
		'app.attraction_address',
		'app.destination',
		'app.nationality',
		'app.user_detail',
		'app.merchant_detail',
		'app.merchant_geolocation',
		'app.deal',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.social_profile',
		'app.attraction_type',
		'app.attraction_comment',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.wishlist',
		'app.facility',
		'app.attractions_facility',
		'app.tag',
		'app.attractions_tag',
		'app.category',
		'app.categories_attraction',
		'app.duration',
		'app.attraction_product_price_group',
		'app.attraction_product_time_slot',
		'app.attraction_products_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Markup = ClassRegistry::init('Markup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Markup);

		parent::tearDown();
	}

}
