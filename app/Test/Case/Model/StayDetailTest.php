<?php
App::uses('StayDetail', 'Model');

/**
 * StayDetail Test Case
 *
 */
class StayDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stay_detail',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_group',
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
		'app.competitor_contact',
		'app.competitor',
		'app.product',
		'app.product_domain',
		'app.product_attachment',
		'app.event_product',
		'app.product_presentation',
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
		'app.competitor_attachment',
		'app.competitor_product',
		'app.event_competitor',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.delegate_role',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.event_guideline',
		'app.stall_detail',
		'app.stall_type',
		'app.website_stall_detail',
		'app.actual_stall_detail',
		'app.budget_detail',
		'app.budget_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StayDetail = ClassRegistry::init('StayDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StayDetail);

		parent::tearDown();
	}

}
