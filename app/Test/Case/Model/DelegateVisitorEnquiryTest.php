<?php
App::uses('DelegateVisitorEnquiry', 'Model');

/**
 * DelegateVisitorEnquiry Test Case
 *
 */
class DelegateVisitorEnquiryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delegate_visitor_enquiry',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_organizer',
		'app.event_organizer_detail',
		'app.department',
		'app.designation',
		'app.competitor_contact',
		'app.competitor',
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
		'app.event_contact',
		'app.partner_contact',
		'app.partner',
		'app.city',
		'app.bank_account',
		'app.company',
		'app.supplier',
		'app.supplier_type',
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_contact',
		'app.supplier_image',
		'app.event_supplier',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.delegate_role',
		'app.event_meeting',
		'app.event_meeting_status',
		'app.booth_type',
		'app.stay_detail',
		'app.competitor_attachment',
		'app.competitor_product',
		'app.event_competitor',
		'app.organizer_event_list',
		'app.events_event_organizer',
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
		'app.delegate_visitor_enquiries_product',
		'app.event_speed_net',
		'app.network_type',
		'app.event_speed_nets_user_activation_detail',
		'app.event_timetable_setup',
		'app.meeting_type',
		'app.visitor_detail',
		'app.visitor_type',
		'app.delegate_visitor_enquiries_visitor_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DelegateVisitorEnquiry = ClassRegistry::init('DelegateVisitorEnquiry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DelegateVisitorEnquiry);

		parent::tearDown();
	}

}
