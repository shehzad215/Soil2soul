<?php
App::uses('ContactOffice', 'Model');

/**
 * ContactOffice Test Case
 *
 */
class ContactOfficeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contact_office',
		'app.contact'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactOffice = ClassRegistry::init('ContactOffice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactOffice);

		parent::tearDown();
	}

}
