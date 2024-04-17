<?php
App::uses('AmenitiesOurJourny', 'Model');

/**
 * AmenitiesOurJourny Test Case
 *
 */
class AmenitiesOurJournyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.amenities_our_journy',
		'app.our_journey',
		'app.amenity',
		'app.our_journy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AmenitiesOurJourny = ClassRegistry::init('AmenitiesOurJourny');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AmenitiesOurJourny);

		parent::tearDown();
	}

}
