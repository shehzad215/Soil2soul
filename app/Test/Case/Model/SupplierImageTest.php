<?php
App::uses('SupplierImage', 'Model');

/**
 * SupplierImage Test Case
 *
 */
class SupplierImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.supplier_image',
		'app.supplier',
		'app.supplier_type',
		'app.city',
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
		'app.market_news',
		'app.supplier_attachment',
		'app.supplier_contact',
		'app.designation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SupplierImage = ClassRegistry::init('SupplierImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SupplierImage);

		parent::tearDown();
	}

}
