<?php
App::uses('EventOrganizerDetail', 'Model');

/**
 * EventOrganizerDetail Test Case
 *
 */
class EventOrganizerDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_organizer_detail',
		'app.event_organizer',
		'app.department',
		'app.country',
		'app.zone',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_group',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.competitor',
		'app.competitor_attachment',
		'app.competitor_contact',
		'app.salutation',
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
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.delegate_role',
		'app.event_meeting',
		'app.booth_type',
		'app.stay_detail',
		'app.competitor_product',
		'app.event_competitor',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.event_guideline',
		'app.stall_detail',
		'app.stall_type',
		'app.website_stall_detail',
		'app.actual_stall_detail',
		'app.budget_detail',
		'app.budget_type',
		'app.product_presentation',
		'app.product',
		'app.product_domain',
		'app.product_attachment',
		'app.event_product',
		'app.event_speed_net',
		'app.network_type',
		'app.event_speed_nets_user_activation_detail',
		'app.event_timetable_setup',
		'app.country_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventOrganizerDetail = ClassRegistry::init('EventOrganizerDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventOrganizerDetail);

		parent::tearDown();
	}

}
