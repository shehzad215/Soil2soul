<?php
App::uses('CompetitorContact', 'Model');

/**
 * CompetitorContact Test Case
 *
 */
class CompetitorContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.competitor_contact',
		'app.competitor',
		'app.salutation',
		'app.attraction_enquiry',
		'app.feedback',
		'app.order_passenger',
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
		'app.currency',
		'app.user_detail',
		'app.marital_status',
		'app.supplier',
		'app.designation',
		'app.event_contact',
		'app.partner_contact',
		'app.supplier_contact'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompetitorContact = ClassRegistry::init('CompetitorContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitorContact);

		parent::tearDown();
	}

}
