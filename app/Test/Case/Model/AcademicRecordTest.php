<?php
App::uses('AcademicRecord', 'Model');

/**
 * AcademicRecord Test Case
 *
 */
class AcademicRecordTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.academic_record',
		'app.career_non_teaching',
		'app.apply_post',
		'app.training'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcademicRecord = ClassRegistry::init('AcademicRecord');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcademicRecord);

		parent::tearDown();
	}

}
