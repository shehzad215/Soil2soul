<?php
App::uses('Amenity', 'Model');

/**
 * Amenity Test Case
 *
 */
class AmenityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.amenity',
		'app.our_journy',
		'app.amenities_our_journy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Amenity = ClassRegistry::init('Amenity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Amenity);

		parent::tearDown();
	}

}
