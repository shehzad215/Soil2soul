<?php
App::uses('Feedback', 'Model');

/**
 * Feedback Test Case
 *
 */
class FeedbackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feedback',
		'app.alumny_detail',
		'app.alumny',
		'app.stream_type',
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
		'app.faculty',
		'app.course',
		'app.course_type',
		'app.alumny_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Feedback = ClassRegistry::init('Feedback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feedback);

		parent::tearDown();
	}

}
