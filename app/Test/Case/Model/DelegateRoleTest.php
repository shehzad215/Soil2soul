<?php
App::uses('DelegateRole', 'Model');

/**
 * DelegateRole Test Case
 *
 */
class DelegateRoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delegate_role',
		'app.role',
		'app.user',
		'app.timezone',
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
		'app.product',
		'app.product_domain',
		'app.product_type',
		'app.product_subtype',
		'app.product_attachment',
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
		'app.competitor_product',
		'app.event_competitor',
		'app.event_attachment',
		'app.event_content',
		'app.event_content_category',
		'app.country_detail',
		'app.currency',
		'app.user_detail',
		'app.user_activation_detail',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DelegateRole = ClassRegistry::init('DelegateRole');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DelegateRole);

		parent::tearDown();
	}

}
