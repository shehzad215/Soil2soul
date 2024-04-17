<?php
App::uses('PlacementStudentCommety', 'Model');

/**
 * PlacementStudentCommety Test Case
 *
 */
class PlacementStudentCommetyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placement_student_commety',
		'app.placement_cell',
		'app.user',
		'app.placemen_picture',
		'app.placement_intenship',
		'app.placement_training_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlacementStudentCommety = ClassRegistry::init('PlacementStudentCommety');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlacementStudentCommety);

		parent::tearDown();
	}

}
