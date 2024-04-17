<?php
App::uses('PartnerContact', 'Model');

/**
 * PartnerContact Test Case
 *
 */
class PartnerContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.partner_contact',
		'app.partner',
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
		'app.event_contact',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.event',
		'app.event_type',
		'app.event_group',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.supplier_contact'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PartnerContact = ClassRegistry::init('PartnerContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PartnerContact);

		parent::tearDown();
	}

}
