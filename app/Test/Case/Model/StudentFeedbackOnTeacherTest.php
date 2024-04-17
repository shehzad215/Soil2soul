<?php
App::uses('StudentFeedbackOnTeacher', 'Model');

/**
 * StudentFeedbackOnTeacher Test Case
 *
 */
class StudentFeedbackOnTeacherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student_feedback_on_teacher',
		'app.college_class',
		'app.student_feedback_on_college',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.department',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.designation',
		'app.staffe',
		'app.salutation',
		'app.sub_department',
		'app.staff_type',
		'app.domin',
		'app.subject_achivement',
		'app.subject_achivement_type',
		'app.subject_activity',
		'app.subject_offer',
		'app.stream_type',
		'app.faculty',
		'app.course',
		'app.course_type',
		'app.academic_year',
		'app.notice'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudentFeedbackOnTeacher = ClassRegistry::init('StudentFeedbackOnTeacher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentFeedbackOnTeacher);

		parent::tearDown();
	}

}
