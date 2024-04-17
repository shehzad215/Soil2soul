<?php
App::uses('CorporateEmail', 'Model');

/**
 * CorporateEmail Test Case
 *
 */
class CorporateEmailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.corporate_email',
		'app.corporate_master',
		'app.corporate_markup',
		'app.corporate_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CorporateEmail = ClassRegistry::init('CorporateEmail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CorporateEmail);

		parent::tearDown();
	}

}
