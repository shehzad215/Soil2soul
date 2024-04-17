<?php
App::uses('BussinessType', 'Model');

/**
 * BussinessType Test Case
 *
 */
class BussinessTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bussiness_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BussinessType = ClassRegistry::init('BussinessType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BussinessType);

		parent::tearDown();
	}

}
