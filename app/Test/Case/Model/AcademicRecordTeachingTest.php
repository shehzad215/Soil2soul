<?php
App::uses('AcademicRecordTeaching', 'Model');

/**
 * AcademicRecordTeaching Test Case
 *
 */
class AcademicRecordTeachingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.academic_record_teaching',
		'app.mode_of_study',
		'app.career_teaching',
		'app.position',
		'app.teaching_experience'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcademicRecordTeaching = ClassRegistry::init('AcademicRecordTeaching');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcademicRecordTeaching);

		parent::tearDown();
	}

}
