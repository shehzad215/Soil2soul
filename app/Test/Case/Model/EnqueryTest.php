<?php
App::uses('Enquery', 'Model');

/**
 * Enquery Test Case
 *
 */
class EnqueryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enquery',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.stream_type',
		'app.user',
		'app.faculty',
		'app.subject_achivement',
		'app.subject_achivement_type',
		'app.course',
		'app.subject_offer',
		'app.subject_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enquery = ClassRegistry::init('Enquery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enquery);

		parent::tearDown();
	}

}
