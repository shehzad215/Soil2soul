<?php
App::uses('TeachingPublication', 'Model');

/**
 * TeachingPublication Test Case
 *
 */
class TeachingPublicationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teaching_publication',
		'app.career_teaching',
		'app.position',
		'app.teaching_experience',
		'app.academic_record_teaching',
		'app.mode_of_study'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeachingPublication = ClassRegistry::init('TeachingPublication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeachingPublication);

		parent::tearDown();
	}

}
