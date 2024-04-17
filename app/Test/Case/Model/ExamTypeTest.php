<?php
App::uses('ExamType', 'Model');

/**
 * ExamType Test Case
 *
 */
class ExamTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.exam_type',
		'app.examinations_result',
		'app.academic_year',
		'app.notice',
		'app.user',
		'app.notification_type',
		'app.course',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.department',
		'app.sub_department',
		'app.alumny',
		'app.stream_type',
		'app.alumny_detail',
		'app.feedback',
		'app.alumny_type',
		'app.subject_achivement',
		'app.subject_achivement_type',
		'app.subject_activity',
		'app.subject_offer',
		'app.faculty',
		'app.designation',
		'app.staffe',
		'app.student_feedback_on_college',
		'app.college_class',
		'app.course_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExamType = ClassRegistry::init('ExamType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExamType);

		parent::tearDown();
	}

}
