<?php
App::uses('EventContact', 'Model');

/**
 * EventContact Test Case
 *
 */
class EventContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_contact',
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
		'app.competitor_contact',
		'app.competitor',
		'app.partner_contact',
		'app.supplier_contact',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.event',
		'app.partner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventContact = ClassRegistry::init('EventContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventContact);

		parent::tearDown();
	}

}
