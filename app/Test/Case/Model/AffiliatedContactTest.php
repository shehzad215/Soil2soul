<?php
App::uses('AffiliatedContact', 'Model');

/**
 * AffiliatedContact Test Case
 *
 */
class AffiliatedContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.affiliated_contact',
		'app.salutation',
		'app.competitor_contact',
		'app.competitor',
		'app.product',
		'app.product_domain',
		'app.product_attachment',
		'app.country',
		'app.zone',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_group',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.event_contact',
		'app.designation',
		'app.partner_contact',
		'app.partner',
		'app.supplier_contact',
		'app.supplier',
		'app.supplier_type',
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_image',
		'app.event_supplier',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.event_competitor',
		'app.event_guideline',
		'app.stall_detail',
		'app.stall_type',
		'app.country_detail',
		'app.timezone',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.competitor_attachment',
		'app.competitor_product',
		'app.affiliated'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AffiliatedContact = ClassRegistry::init('AffiliatedContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AffiliatedContact);

		parent::tearDown();
	}

}
