<?php
App::uses('MarketsCountry', 'Model');

/**
 * MarketsCountry Test Case
 *
 */
class MarketsCountryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.markets_country',
		'app.stall_designer',
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
		'app.product_type',
		'app.product_subtype',
		'app.product_attachment',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.event_contact',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_group',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.designation',
		'app.partner_contact',
		'app.partner',
		'app.supplier_contact',
		'app.supplier',
		'app.supplier_type',
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_image',
		'app.competitor_attachment',
		'app.competitor_product',
		'app.currency',
		'app.user_detail',
		'app.stall_designers_country',
		'app.stall_designer_detail',
		'app.stall_designer_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MarketsCountry = ClassRegistry::init('MarketsCountry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MarketsCountry);

		parent::tearDown();
	}

}
