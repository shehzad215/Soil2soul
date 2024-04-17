<?php
App::uses('OurClient', 'Model');

/**
 * OurClient Test Case
 *
 */
class OurClientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_client'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OurClient = ClassRegistry::init('OurClient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurClient);

		parent::tearDown();
	}

}
