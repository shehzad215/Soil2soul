<?php
App::uses('PlacementCell', 'Model');

/**
 * PlacementCell Test Case
 *
 */
class PlacementCellTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placement_cell',
		'app.user',
		'app.placemen_picture',
		'app.placement_intenship',
		'app.placement_student_commety',
		'app.placement_training_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlacementCell = ClassRegistry::init('PlacementCell');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlacementCell);

		parent::tearDown();
	}

}
