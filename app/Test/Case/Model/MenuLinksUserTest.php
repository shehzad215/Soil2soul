<?php
App::uses('MenuLinksUser', 'Model');

/**
 * MenuLinksUser Test Case
 *
 */
class MenuLinksUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.menu_links_user',
		'app.menu_link',
		'app.menu',
		'app.role',
		'app.user',
		'app.timezone',
		'app.deal',
		'app.category',
		'app.categories_deal',
		'app.deal_coupon',
		'app.deal_image',
		'app.deal_offer',
		'app.market',
		'app.country',
		'app.deals_market',
		'app.tag',
		'app.deals_tag',
		'app.user_subscription_payment',
		'app.user_subscription',
		'app.menu_links_role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MenuLinksUser = ClassRegistry::init('MenuLinksUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MenuLinksUser);

		parent::tearDown();
	}

}
