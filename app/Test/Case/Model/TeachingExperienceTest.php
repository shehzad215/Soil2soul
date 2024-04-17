<?php
App::uses('TeachingExperience', 'Model');

/**
 * TeachingExperience Test Case
 *
 */
class TeachingExperienceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teaching_experience',
		'app.career_teaching',
		'app.position',
		'app.passed_exmination',
		'app.mode_of_study'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeachingExperience = ClassRegistry::init('TeachingExperience');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeachingExperience);

		parent::tearDown();
	}

}
