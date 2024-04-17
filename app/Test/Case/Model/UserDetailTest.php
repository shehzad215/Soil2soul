<?php
App::uses('UserDetail', 'Model');

/**
 * UserDetail Test Case
 *
 */
class UserDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_detail',
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
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserDetail = ClassRegistry::init('UserDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDetail);

		parent::tearDown();
	}

}
