<?php
App::uses('NetworkType', 'Model');

/**
 * NetworkType Test Case
 *
 */
class NetworkTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.network_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NetworkType = ClassRegistry::init('NetworkType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NetworkType);

		parent::tearDown();
	}

}
