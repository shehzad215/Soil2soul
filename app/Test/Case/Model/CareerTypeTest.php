<?php
App::uses('CareerType', 'Model');

/**
 * CareerType Test Case
 *
 */
class CareerTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.career_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CareerType = ClassRegistry::init('CareerType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CareerType);

		parent::tearDown();
	}

}
