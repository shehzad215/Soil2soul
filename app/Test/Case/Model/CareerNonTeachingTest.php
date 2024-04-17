<?php
App::uses('CareerNonTeaching', 'Model');

/**
 * CareerNonTeaching Test Case
 *
 */
class CareerNonTeachingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.career_non_teaching',
		'app.apply_post',
		'app.academic_record',
		'app.training'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CareerNonTeaching = ClassRegistry::init('CareerNonTeaching');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CareerNonTeaching);

		parent::tearDown();
	}

}
