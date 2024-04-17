<?php
App::uses('BoothType', 'Model');

/**
 * BoothType Test Case
 *
 */
class BoothTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.booth_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BoothType = ClassRegistry::init('BoothType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BoothType);

		parent::tearDown();
	}

}
