<?php
App::uses('CrmQuoteProcese', 'Model');

/**
 * CrmQuoteProcese Test Case
 *
 */
class CrmQuoteProceseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.crm_quote_procese',
		'app.crm_quote_request',
		'app.delegate_visitor_enquiry',
		'app.event',
		'app.event_type',
		'app.event_domain',
		'app.company',
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
		'app.state',
		'app.visitor_detail',
		'app.city',
		'app.bank_account',
		'app.competitor',
		'app.contact',
		'app.contact_type',
		'app.visitor_type',
		'app.market',
		'app.markets_country',
		'app.supplier',
		'app.supplier_type',
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_contact',
		'app.salutation',
		'app.competitor_contact',
		'app.designation',
		'app.sub_department',
		'app.department',
		'app.event_contact',
		'app.partner_contact',
		'app.partner',
		'app.partner_activation_detail',
		'app.partner_attachment',
		'app.supplier_image',
		'app.event_supplier',
		'app.stall_designer',
		'app.stall_designers_country',
		'app.stall_designer_detail',
		'app.stall_designer_image',
		'app.event_organizer',
		'app.event_organizer_detail',
		'app.organizer_event_list',
		'app.contact_detail',
		'app.competitor_attachment',
		'app.competitor_product',
		'app.event_competitor',
		'app.currency',
		'app.master_user_type',
		'app.user_detail',
		'app.crm_right',
		'app.user_activation_detail',
		'app.delegate_role',
		'app.event_meeting',
		'app.event_meeting_status',
		'app.booth_type',
		'app.event_meeting_status_history',
		'app.stay_detail',
		'app.user_login_detail',
		'app.user_finance',
		'app.financial_year',
		'app.individual_target',
		'app.month',
		'app.individual_targets_month',
		'app.group_target',
		'app.target_group_user',
		'app.group_targets_user',
		'app.group_targets_month',
		'app.financial_domain_cost',
		'app.finacial_unit_cost',
		'app.user_grade',
		'app.user_worksheet',
		'app.enquiry_source_type',
		'app.delegate_visitor_enquiry_detail',
		'app.email_campaign',
		'app.email_campaign_log',
		'app.email_campaign_attachment',
		'app.meeting_type',
		'app.crm_blocked_date',
		'app.user_assieng_project_module',
		'app.project_management',
		'app.project_type',
		'app.crm_quote',
		'app.quote_type',
		'app.crm_meeting_status',
		'app.amc_term',
		'app.crm_licence_cost',
		'app.sale_upload',
		'app.amc_type',
		'app.sale_upload_attachment',
		'app.sales_payment_term',
		'app.sales_payment_schedule',
		'app.sales_payment_schedule_project',
		'app.sales_amc_schedule',
		'app.crm_quote_service_value',
		'app.quotation_service',
		'app.amc_service_type',
		'app.amc_period',
		'app.crm_quote_service_renewal_value',
		'app.sales_payment_upload',
		'app.amc_payment_upload',
		'app.service_payment_upload',
		'app.crm_custamize_charge',
		'app.crm_quote_contac',
		'app.crm_quote_attachment',
		'app.project_management_document',
		'app.project_document_name',
		'app.project_management_team',
		'app.member_role',
		'app.project_management_clientteam',
		'app.client_activation_detail',
		'app.project_grid_setup',
		'app.project_field_setup',
		'app.project_sub_grid_setup',
		'app.project_form_setup',
		'app.client_note',
		'app.client_note_attachment',
		'app.project_field_column_type',
		'app.project_status',
		'app.project_module',
		'app.project_category',
		'app.module',
		'app.daily_to_do_list',
		'app.task_type',
		'app.task_priority',
		'app.project_daily_report',
		'app.project_assiened_task',
		'app.project_assiened_qa_task',
		'app.sale_team_to_do_list',
		'app.marketing_team_report_master',
		'app.project_wise_management_team',
		'app.emplyee_project_status',
		'app.product',
		'app.product_attachment',
		'app.event_product',
		'app.product_presentation',
		'app.sub_product',
		'app.product_variant',
		'app.products_user',
		'app.product_platform',
		'app.finance',
		'app.finance_api_detail',
		'app.api',
		'app.api_type',
		'app.finances_product',
		'app.finances_product_platform',
		'app.product_platforms_user',
		'app.users_market',
		'app.database_enquiry',
		'app.database_enquiries_user',
		'app.task_management',
		'app.task_managements_user',
		'app.demo_status',
		'app.task_management_attachment',
		'app.database_enquiries_task_management',
		'app.moved_reason',
		'app.database_type',
		'app.database_detail',
		'app.crm_lead_remark',
		'app.database_product_require',
		'app.database_product',
		'app.database_record_status',
		'app.database_status',
		'app.database_cost',
		'app.crm_followup',
		'app.crm_stage',
		'app.crm_assigned_lead',
		'app.crm_assigned_leads_user',
		'app.crm_sub_stage',
		'app.crm_followup_attachment',
		'app.crm_followup_remark',
		'app.crm_note',
		'app.crm_schedule_demo',
		'app.crm_schedule_demo_attachment',
		'app.crm_schedule_demo_attendy',
		'app.crm_schedule_demos_user',
		'app.crm_user_product',
		'app.telecalling_log',
		'app.telecalling_attachment',
		'app.stage',
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
		'app.event_speed_net',
		'app.network_type',
		'app.event_speed_nets_user_activation_detail',
		'app.event_timetable_setup',
		'app.crm_enquiry_stage',
		'app.crm_enquiry_status',
		'app.source_type',
		'app.lost_reason',
		'app.crm_lead_stage',
		'app.crm_lead_status',
		'app.delegate_status',
		'app.bussiness_type',
		'app.cross_sale',
		'app.partner_commission',
		'app.partner_payment',
		'app.moved_to_presale',
		'app.moved_to_sale',
		'app.crm_assigned_pre_enquiry',
		'app.delegate_swap_user_history',
		'app.delegate_marge_enquiry',
		'app.delegate_approval_enquiry',
		'app.delegate_enquiry_schedule',
		'app.delegate_enquiry_reschedule',
		'app.crm_moved_enquiry',
		'app.crm_assigned_project',
		'app.crm_assigned_quote',
		'app.crm_assigned_sale',
		'app.crm_prospect_value',
		'app.question_answer',
		'app.question_type',
		'app.question',
		'app.delegate_image',
		'app.client_testimonial',
		'app.company_proforma_invoice',
		'app.proforma_attachment',
		'app.trail_login',
		'app.delegate_visitor_enquiries_event_product',
		'app.delegate_visitor_enquiries_user',
		'app.crm_quote_request_contact',
		'app.crm_quote_request_attachment',
		'app.booking_portal',
		'app.booking_proces'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrmQuoteProcese = ClassRegistry::init('CrmQuoteProcese');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrmQuoteProcese);

		parent::tearDown();
	}

}
