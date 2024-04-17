<?php
App::uses('AcademicYear', 'Model');

/**
 * AcademicYear Test Case
 *
 */
class AcademicYearTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.academic_year',
		'app.notice',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcademicYear = ClassRegistry::init('AcademicYear');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcademicYear);

		parent::tearDown();
	}

}
