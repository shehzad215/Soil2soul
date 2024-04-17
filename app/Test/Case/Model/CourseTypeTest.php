<?php
App::uses('CourseType', 'Model');

/**
 * CourseType Test Case
 *
 */
class CourseTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.course_type',
		'app.course',
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
		'app.faculty'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CourseType = ClassRegistry::init('CourseType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CourseType);

		parent::tearDown();
	}

}
