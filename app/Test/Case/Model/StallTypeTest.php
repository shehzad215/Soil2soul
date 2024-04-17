<?php
App::uses('StallType', 'Model');

/**
 * StallType Test Case
 *
 */
class StallTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stall_type',
		'app.stall_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StallType = ClassRegistry::init('StallType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StallType);

		parent::tearDown();
	}

}
