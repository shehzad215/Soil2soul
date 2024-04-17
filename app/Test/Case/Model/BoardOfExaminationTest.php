<?php
App::uses('BoardOfExamination', 'Model');

/**
 * BoardOfExamination Test Case
 *
 */
class BoardOfExaminationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.board_of_examination',
		'app.academic_year',
		'app.notice',
		'app.user',
		'app.notification_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BoardOfExamination = ClassRegistry::init('BoardOfExamination');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BoardOfExamination);

		parent::tearDown();
	}

}
