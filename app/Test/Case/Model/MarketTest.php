<?php
App::uses('Market', 'Model');

/**
 * Market Test Case
 *
 */
class MarketTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.market',
		'app.country',
		'app.zone',
		'app.country_detail',
		'app.timezone',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.salutation',
		'app.attraction_enquiry',
		'app.feedback',
		'app.order_passenger',
		'app.currency',
		'app.user_detail',
		'app.marital_status',
		'app.supplier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Market = ClassRegistry::init('Market');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Market);

		parent::tearDown();
	}

}
