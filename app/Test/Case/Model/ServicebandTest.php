<?php
App::uses('Serviceband', 'Model');

/**
 * Serviceband Test Case
 *
 */
class ServicebandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.serviceband'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Serviceband = ClassRegistry::init('Serviceband');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Serviceband);

		parent::tearDown();
	}

}
