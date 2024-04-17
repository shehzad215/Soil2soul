<?php
App::uses('ModeOfStudy', 'Model');

/**
 * ModeOfStudy Test Case
 *
 */
class ModeOfStudyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mode_of_study',
		'app.career_teaching'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ModeOfStudy = ClassRegistry::init('ModeOfStudy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModeOfStudy);

		parent::tearDown();
	}

}
