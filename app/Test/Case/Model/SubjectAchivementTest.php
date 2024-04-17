<?php
App::uses('SubjectAchivement', 'Model');

/**
 * SubjectAchivement Test Case
 *
 */
class SubjectAchivementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subject_achivement',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.stream_type',
		'app.user',
		'app.faculty',
		'app.subject_achivement_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectAchivement = ClassRegistry::init('SubjectAchivement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectAchivement);

		parent::tearDown();
	}

}
