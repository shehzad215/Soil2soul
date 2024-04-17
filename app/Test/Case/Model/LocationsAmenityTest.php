<?php
App::uses('LocationsAmenity', 'Model');

/**
 * LocationsAmenity Test Case
 *
 */
class LocationsAmenityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.locations_amenity',
		'app.location',
		'app.location_image',
		'app.offering_pricing',
		'app.amenity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationsAmenity = ClassRegistry::init('LocationsAmenity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationsAmenity);

		parent::tearDown();
	}

}
