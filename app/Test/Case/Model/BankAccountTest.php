<?php
App::uses('BankAccount', 'Model');

/**
 * BankAccount Test Case
 *
 */
class BankAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bank_account',
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
		'app.supplier',
		'app.city',
		'app.branch'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BankAccount = ClassRegistry::init('BankAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BankAccount);

		parent::tearDown();
	}

}
