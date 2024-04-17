<?php
App::uses('OurJourneyDeparture', 'Model');

/**
 * OurJourneyDeparture Test Case
 *
 */
class OurJourneyDepartureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_journey_departure',
		'app.our_journy',
		'app.currency',
		'app.faq',
		'app.journey_image',
		'app.our_journey_exlusion',
		'app.our_journey_inclusion',
		'app.our_journey_itenery',
		'app.amenity',
		'app.amenities_our_journy',
		'app.our_team',
		'app.our_teams_our_journy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OurJourneyDeparture = ClassRegistry::init('OurJourneyDeparture');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurJourneyDeparture);

		parent::tearDown();
	}

}
