<?php
App::uses('Competitor', 'Model');

/**
 * Competitor Test Case
 *
 */
class CompetitorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.competitor',
		'app.product',
		'app.product_domain',
		'app.product_type',
		'app.product_subtype',
		'app.product_attachment',
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
		'app.supplier',
		'app.supplier_type',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.event_contact',
		'app.designation',
		'app.competitor_contact',
		'app.partner_contact',
		'app.partner',
		'app.supplier_contact',
		'app.event',
		'app.event_type',
		'app.event_group',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_image',
		'app.competitor_attachment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Competitor = ClassRegistry::init('Competitor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Competitor);

		parent::tearDown();
	}

}
