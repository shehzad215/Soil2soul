<?php
App::uses('BookingFacility', 'Model');

/**
 * BookingFacility Test Case
 *
 */
class BookingFacilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.booking_facility'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookingFacility = ClassRegistry::init('BookingFacility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookingFacility);

		parent::tearDown();
	}

}
