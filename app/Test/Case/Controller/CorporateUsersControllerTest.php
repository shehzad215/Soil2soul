<?php
App::uses('CorporateUsersController', 'Controller');

/**
 * CorporateUsersController Test Case
 *
 */
class CorporateUsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.corporate_user',
		'app.corporate_master',
		'app.corporate_email',
		'app.corporate_markup',
		'app.currency',
		'app.markup',
		'app.country',
		'app.zone',
		'app.country_detail',
		'app.attraction_address',
		'app.attraction',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.timezone',
		'app.salutation',
		'app.attraction_enquiry',
		'app.attraction_product',
		'app.attraction_comment',
		'app.attraction_product_question',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.cart_item_detail',
		'app.cart_item',
		'app.cart',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.pickup_point_api_map',
		'app.api_pickup_point',
		'app.attraction_product_time_slot',
		'app.nationality',
		'app.order_attraction_product_price',
		'app.order_detail',
		'app.order',
		'app.icici_response_status_code_track',
		'app.paypal_response_track_detail',
		'app.payer',
		'app.txn',
		'app.receiver',
		'app.payumoney_response_track_detail',
		'app.paytm_response_track_detail',
		'app.order_agent_credit_payement_history',
		'app.order_add_edit_history',
		'app.order_status',
		'app.attraction_order_status',
		'app.destination',
		'app.destination_api_map',
		'app.order_attraction',
		'app.attraction_type',
		'app.attractions_type',
		'app.attraction_type_api_map',
		'app.orders_attractions_type',
		'app.order_attraction_address',
		'app.order_attraction_product',
		'app.order_asia_travel_activity_price_request_response_track',
		'app.asia_travel_api_activity',
		'app.asia_travel_api_activity_pickuppointlist',
		'app.asia_travel_api_activity_tour',
		'app.asia_travel_api_tour',
		'app.asia_travel_api_tour_blockoutdate',
		'app.asia_travel_api_tour_image',
		'app.attraction_product_api_map',
		'app.asia_travel_activity_price_request_response_track',
		'app.api_booking_request_response_track',
		'app.api_booking_voucher_url',
		'app.asia_travel_api_tour_option',
		'app.order_api_booking_request_response_track',
		'app.order_api_booking_voucher_url',
		'app.order_attraction_product_api_request_response_track',
		'app.order_attraction_closed_date',
		'app.order_attraction_product_pickup_point',
		'app.order_attraction_product_price_group',
		'app.order_passenger',
		'app.order_attraction_product_time_slot',
		'app.order_attraction_product_cancellation_policy',
		'app.order_attraction_regular_timing',
		'app.week_day',
		'app.attraction_regular_timing',
		'app.attraction_product_prices_week_day',
		'app.order_attraction_contact',
		'app.order_attraction_product_question',
		'app.order_attraction_product_comment_by_hotel_bed',
		'app.facility',
		'app.attractions_facility',
		'app.orders_facility',
		'app.order_attractions_facility',
		'app.attraction_tag_list_group',
		'app.attraction_tag_list',
		'app.agent_destination_markup',
		'app.order_cancellation',
		'app.order_single_cancellation',
		'app.traveller',
		'app.order_tax',
		'app.order_traveller',
		'app.order_traveller_detail',
		'app.order_detail_voucher_pdf_file',
		'app.specific_price',
		'app.temp_order',
		'app.temp_order_combo_product',
		'app.attraction_product_prices_nationality',
		'app.attraction_product_prices_except_nationality',
		'app.attraction_product_price_festival',
		'app.attraction_closed_date',
		'app.attraction_product_cancellation_policy',
		'app.attraction_product_combo',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.feedback',
		'app.agent_credit_type',
		'app.agent_type_master',
		'app.user_detail',
		'app.marital_status',
		'app.agent_security_payment',
		'app.agent_credit_limit',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.wishlist',
		'app.blog_comment',
		'app.post',
		'app.template_layout',
		'app.post_image',
		'app.blog_category',
		'app.blogs_category',
		'app.attraction_add_edit_history',
		'app.most_viewed_attraction',
		'app.agent_payment',
		'app.agent_attraction_markup',
		'app.featured_attraction',
		'app.top_attraction',
		'app.top_tour',
		'app.deal_of_the_day',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_video',
		'app.category',
		'app.category_api_map',
		'app.attractions_category'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testLists method
 *
 * @return void
 */
	public function testLists() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
	}

/**
 * testAdminLists method
 *
 * @return void
 */
	public function testAdminLists() {
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
	}

}
