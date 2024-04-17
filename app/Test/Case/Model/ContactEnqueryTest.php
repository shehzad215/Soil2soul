<?php
App::uses('ContactEnquery', 'Model');

/**
 * ContactEnquery Test Case
 *
 */
class ContactEnqueryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contact_enquery',
		'app.test'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactEnquery = ClassRegistry::init('ContactEnquery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactEnquery);

		parent::tearDown();
	}

}
