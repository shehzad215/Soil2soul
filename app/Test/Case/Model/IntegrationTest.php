<?php
App::uses('Integration', 'Model');

/**
 * Integration Test Case
 *
 */
class IntegrationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.integration'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Integration = ClassRegistry::init('Integration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Integration);

		parent::tearDown();
	}

}
