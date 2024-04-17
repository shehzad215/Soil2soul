<?php
App::uses('EventCompetitor', 'Model');

/**
 * EventCompetitor Test Case
 *
 */
class EventCompetitorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_competitor',
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
		'app.product_type',
		'app.product_subtype',
		'app.product_attachment',
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
		'app.events_supplier',
		'app.competitor_attachment',
		'app.competitor_product',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventCompetitor = ClassRegistry::init('EventCompetitor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventCompetitor);

		parent::tearDown();
	}

}
