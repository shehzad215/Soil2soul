<?php
App::uses('AttractionsFacility', 'Model');

/**
 * AttractionsFacility Test Case
 *
 */
class AttractionsFacilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attractions_facility',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.country',
		'app.market',
		'app.city',
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
		'app.attraction_address',
		'app.attraction_comment',
		'app.attraction_product',
		'app.duration',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.nationality',
		'app.currency',
		'app.order_tax',
		'app.tax_type',
		'app.attraction_product_time_slot',
		'app.markup',
		'app.tag',
		'app.attraction_products_tag',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_regular_timing',
		'app.week_day',
		'app.wishlist',
		'app.facility',
		'app.attractions_tag',
		'app.category',
		'app.categories_attraction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionsFacility = ClassRegistry::init('AttractionsFacility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionsFacility);

		parent::tearDown();
	}

}
