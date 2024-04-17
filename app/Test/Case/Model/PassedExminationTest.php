<?php
App::uses('PassedExmination', 'Model');

/**
 * PassedExmination Test Case
 *
 */
class PassedExminationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.passed_exmination',
		'app.career_teaching'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PassedExmination = ClassRegistry::init('PassedExmination');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PassedExmination);

		parent::tearDown();
	}

}
