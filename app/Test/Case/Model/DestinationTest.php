<?php
App::uses('Destination', 'Model');

/**
 * Destination Test Case
 *
 */
class DestinationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.destination',
		'app.country',
		'app.zone',
		'app.asia_travel_api_activity',
		'app.asia_travel_api_activity_pickuppointlist',
		'app.asia_travel_api_activity_tour',
		'app.asia_travel_api_tour',
		'app.asia_travel_api_tour_blockoutdate',
		'app.asia_travel_api_tour_image',
		'app.attraction_product_api_map',
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
		'app.attraction_product_price_group',
		'app.attraction_product_price',
		'app.currency',
		'app.markup',
		'app.specific_price',
		'app.nationality',
		'app.cart_item',
		'app.cart',
		'app.attraction_product_pickup_point',
		'app.pickup_point_type',
		'app.pickup_point_api_map',
		'app.api_pickup_point',
		'app.attraction_product_time_slot',
		'app.cart_item_detail',
		'app.temp_order_combo_product',
		'app.order_attraction_product_price',
		'app.order_detail',
		'app.order',
		'app.icici_response_status_code_track',
		'app.order_status',
		'app.order_attraction',
		'app.attraction_type',
		'app.attractions_type',
		'app.attraction_type_api_map',
		'app.orders_attractions_type',
		'app.order_attraction_address',
		'app.order_attraction_product',
		'app.order_asia_travel_activity_price_request_response_track',
		'app.order_api_booking_request_response_track',
		'app.order_api_booking_voucher_url',
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
		'app.facility',
		'app.attractions_facility',
		'app.orders_facility',
		'app.order_attractions_facility',
		'app.traveller',
		'app.order_edit_price',
		'app.order_tax',
		'app.order_traveller',
		'app.order_traveller_detail',
		'app.temp_order',
		'app.attraction_product_prices_nationality',
		'app.attraction_product_prices_except_nationality',
		'app.attraction_product_price_festival',
		'app.attraction_closed_date',
		'app.attraction_product_cancellation_policy',
		'app.attraction_product_combo',
		'app.asia_travel_activity_price_request_response_track',
		'app.api_booking_request_response_track',
		'app.api_booking_voucher_url',
		'app.tag',
		'app.attraction_products_tag',
		'app.attractions_tag',
		'app.user_detail',
		'app.marital_status',
		'app.user_social_profile',
		'app.user_subscription_payment',
		'app.subscription_plan',
		'app.user_subscription',
		'app.payment_method',
		'app.payment_status',
		'app.wishlist',
		'app.feedback',
		'app.attraction_tag_list',
		'app.attraction_tag_list_group',
		'app.attraction_address',
		'app.featured_attraction',
		'app.top_attraction',
		'app.attraction_contact',
		'app.attraction_image',
		'app.attraction_video',
		'app.category',
		'app.category_api_map',
		'app.attractions_category',
		'app.country_detail',
		'app.destination_api_map'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Destination = ClassRegistry::init('Destination');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Destination);

		parent::tearDown();
	}

}
