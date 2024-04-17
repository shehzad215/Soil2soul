<?php
App::uses('PositionsOpening', 'Model');

/**
 * PositionsOpening Test Case
 *
 */
class PositionsOpeningTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.positions_opening',
		'app.position',
		'app.career_type',
		'app.career_teaching',
		'app.teaching_experience',
		'app.academic_record_teaching',
		'app.mode_of_study',
		'app.teaching_publication',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PositionsOpening = ClassRegistry::init('PositionsOpening');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PositionsOpening);

		parent::tearDown();
	}

}
