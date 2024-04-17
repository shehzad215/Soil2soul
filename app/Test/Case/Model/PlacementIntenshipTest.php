<?php
App::uses('PlacementIntenship', 'Model');

/**
 * PlacementIntenship Test Case
 *
 */
class PlacementIntenshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placement_intenship',
		'app.placement_cell',
		'app.user',
		'app.placemen_picture',
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
		$this->PlacementIntenship = ClassRegistry::init('PlacementIntenship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlacementIntenship);

		parent::tearDown();
	}

}
