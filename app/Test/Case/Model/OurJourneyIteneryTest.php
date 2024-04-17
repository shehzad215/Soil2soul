<?php
App::uses('OurJourneyItenery', 'Model');

/**
 * OurJourneyItenery Test Case
 *
 */
class OurJourneyIteneryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_journey_itenery',
		'app.our_journy',
		'app.curency',
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
		$this->OurJourneyItenery = ClassRegistry::init('OurJourneyItenery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurJourneyItenery);

		parent::tearDown();
	}

}
