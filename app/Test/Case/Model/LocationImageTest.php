<?php
App::uses('LocationImage', 'Model');

/**
 * LocationImage Test Case
 *
 */
class LocationImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.location_image',
		'app.location'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationImage = ClassRegistry::init('LocationImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationImage);

		parent::tearDown();
	}

}
