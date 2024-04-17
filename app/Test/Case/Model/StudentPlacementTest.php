<?php
App::uses('StudentPlacement', 'Model');

/**
 * StudentPlacement Test Case
 *
 */
class StudentPlacementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student_placement',
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
		$this->StudentPlacement = ClassRegistry::init('StudentPlacement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentPlacement);

		parent::tearDown();
	}

}
