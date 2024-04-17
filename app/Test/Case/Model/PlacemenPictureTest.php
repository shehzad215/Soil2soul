<?php
App::uses('PlacemenPicture', 'Model');

/**
 * PlacemenPicture Test Case
 *
 */
class PlacemenPictureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.placemen_picture',
		'app.placement_cell',
		'app.user',
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
		$this->PlacemenPicture = ClassRegistry::init('PlacemenPicture');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlacemenPicture);

		parent::tearDown();
	}

}
