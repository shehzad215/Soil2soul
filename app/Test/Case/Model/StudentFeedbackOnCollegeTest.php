<?php
App::uses('StudentFeedbackOnCollege', 'Model');

/**
 * StudentFeedbackOnCollege Test Case
 *
 */
class StudentFeedbackOnCollegeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student_feedback_on_college',
		'app.class',
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
		'app.domin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudentFeedbackOnCollege = ClassRegistry::init('StudentFeedbackOnCollege');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentFeedbackOnCollege);

		parent::tearDown();
	}

}
