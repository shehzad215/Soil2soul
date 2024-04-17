<?php
App::uses('CareerTeaching', 'Model');

/**
 * CareerTeaching Test Case
 *
 */
class CareerTeachingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.career_teaching',
		'app.position',
		'app.passed_exmination',
		'app.mode_of_study',
		'app.teaching_experience'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CareerTeaching = ClassRegistry::init('CareerTeaching');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CareerTeaching);

		parent::tearDown();
	}

}
