<?php
App::uses('PlacementTrainingActivity', 'Model');

/**
 * PlacementTrainingActivity Test Case
 *
 */
class PlacementTrainingActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placement_training_activity',
		'app.placement_cell',
		'app.user',
		'app.placemen_picture',
		'app.placement_intenship',
		'app.placement_student_commety'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlacementTrainingActivity = ClassRegistry::init('PlacementTrainingActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlacementTrainingActivity);

		parent::tearDown();
	}

}
