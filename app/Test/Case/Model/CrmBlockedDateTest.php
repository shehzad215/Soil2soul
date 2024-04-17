<?php
App::uses('CrmBlockedDate', 'Model');

/**
 * CrmBlockedDate Test Case
 *
 */
class CrmBlockedDateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.crm_blocked_date',
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
		'app.visitor_detail',
		'app.delegate_visitor_enquiry',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.event_organizer',
		'app.contact',
		'app.contact_type',
		'app.visitor_type',
		'app.market',
		'app.markets_country',
		'app.supplier',
		'app.supplier_type',
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
		'app.department',
		'app.market_news',
		'app.competitor_product',
		'app.event_competitor',
		'app.supplier_attachment',
		'app.supplier_image',
		'app.event_supplier',
		'app.stall_designer',
		'app.stall_designers_country',
		'app.stall_designer_detail',
		'app.stall_designer_image',
		'app.contact_detail',
		'app.event_organizer_detail',
		'app.organizer_event_list',
		'app.events_event_organizer',
		'app.currency',
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
		'app.user_activation_detail',
		'app.delegate_role',
		'app.event_meeting',
		'app.event_meeting_status',
		'app.booth_type',
		'app.event_meeting_status_history',
		'app.stay_detail',
		'app.event_speed_net',
		'app.network_type',
		'app.event_speed_nets_user_activation_detail',
		'app.event_timetable_setup',
		'app.meeting_type',
		'app.crm_meeting_status',
		'app.source_type',
		'app.enquiry_source_type',
		'app.delegate_visitor_enquiry_detail',
		'app.email_campaign',
		'app.email_campaign_log',
		'app.email_campaign_attachment',
		'app.lost_reason',
		'app.crm_assigned_lead',
		'app.crm_stage',
		'app.crm_followup',
		'app.crm_sub_stage',
		'app.crm_followup_attachment',
		'app.crm_followup_remark',
		'app.crm_note',
		'app.crm_schedule_demo',
		'app.demo_status',
		'app.crm_schedule_demo_attachment',
		'app.crm_schedule_demo_attendy',
		'app.crm_schedule_demos_user',
		'app.crm_user_product',
		'app.telecalling_log',
		'app.telecalling_attachment',
		'app.stage',
		'app.crm_assigned_leads_user',
		'app.crm_assigned_pre_enquiry',
		'app.delegate_swap_user_history',
		'app.finance',
		'app.finance_api_detail',
		'app.api',
		'app.api_type',
		'app.finances_product',
		'app.product_platform',
		'app.finances_product_platform',
		'app.sale_upload',
		'app.sale_upload_attachment',
		'app.sales_payment_term',
		'app.sales_payment_schedule',
		'app.crm_quote_service_value',
		'app.crm_quote',
		'app.quote_type',
		'app.crm_quote_attachment',
		'app.quotation_service',
		'app.amc_service_type',
		'app.amc_period',
		'app.amc_type',
		'app.delegate_enquiry_schedule',
		'app.delegate_enquiry_reschedule',
		'app.delegate_visitor_enquiries_event_product',
		'app.master_user_type',
		'app.user_detail',
		'app.crm_right',
		'app.products_user',
		'app.product_platforms_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrmBlockedDate = ClassRegistry::init('CrmBlockedDate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrmBlockedDate);

		parent::tearDown();
	}

}
