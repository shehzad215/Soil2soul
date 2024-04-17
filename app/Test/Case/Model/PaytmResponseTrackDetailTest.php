<?php
App::uses('PaytmResponseTrackDetail', 'Model');

/**
 * PaytmResponseTrackDetail Test Case
 *
 */
class PaytmResponseTrackDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paytm_response_track_detail',
		'app.order',
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
		'app.attraction_address',
		'app.attraction',
		'app.destination',
		'app.destination_api_map',
		'app.order_attraction',
		'app.order_detail',
		'app.order_status',
		'app.attraction_order_status',
		'app.attraction_product',
		'app.attraction_comment',
		'app.attraction_enquiry',
		'app.nationality',
		'app.cart_item',
		'app.cart',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.pickup_point_api_map',
		'app.api_pickup_point',
		'app.attraction_product_time_slot',
		'app.cart_item_detail',
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.currency',
		'app.markup',
		'app.specific_price',
		'app.temp_order',
		'app.attraction_product_prices_nationality',
		'app.week_day',
		'app.attraction_regular_timing',
		'app.order_attraction_regular_timing',
		'app.order_attraction_product',
		'app.order_attraction_address',
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
		'app.order_attraction_product_price',
		'app.order_passenger',
		'app.order_attraction_product_time_slot',
		'app.order_attraction_product_cancellation_policy',
		'app.order_attraction_contact',
		'app.order_attraction_product_question',
		'app.order_attraction_product_comment_by_hotel_bed',
		'app.facility',
		'app.attractions_facility',
		'app.orders_facility',
		'app.attraction_product_prices_week_day',
		'app.attraction_product_prices_except_nationality',
		'app.attraction_product_price_festival',
		'app.temp_order_combo_product',
		'app.salutation',
		'app.feedback',
		'app.attraction_closed_date',
		'app.attraction_product_cancellation_policy',
		'app.attraction_product_combo',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.order_cancellation',
		'app.order_single_cancellation',
		'app.traveller',
		'app.order_attractions_facility',
		'app.order_tax',
		'app.order_traveller',
		'app.order_traveller_detail',
		'app.orders_attractions_type',
		'app.attraction_type',
		'app.attractions_type',
		'app.attraction_type_api_map',
		'app.attraction_tag_list_group',
		'app.attraction_tag_list',
		'app.featured_attraction',
		'app.top_attraction',
		'app.deal_of_the_day',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_video',
		'app.wishlist',
		'app.attraction_add_edit_history',
		'app.category',
		'app.category_api_map',
		'app.attractions_category',
		'app.user_detail',
		'app.marital_status',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.blog_comment',
		'app.post',
		'app.template_layout',
		'app.post_image',
		'app.blog_category',
		'app.blogs_category',
		'app.order_add_edit_history',
		'app.icici_response_status_code_track',
		'app.paypal_response_track_detail',
		'app.payer',
		'app.txn',
		'app.receiver',
		'app.payumoney_response_track_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaytmResponseTrackDetail = ClassRegistry::init('PaytmResponseTrackDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaytmResponseTrackDetail);

		parent::tearDown();
	}

}
