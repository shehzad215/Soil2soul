<?php
App::uses('SubjectActivity', 'Model');

/**
 * SubjectActivity Test Case
 *
 */
class SubjectActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subject_activity',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.stream_type',
		'app.user',
		'app.faculty',
		'app.subject_achivement',
		'app.subject_achivement_type',
		'app.course',
		'app.subject_offer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectActivity = ClassRegistry::init('SubjectActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectActivity);

		parent::tearDown();
	}

}
