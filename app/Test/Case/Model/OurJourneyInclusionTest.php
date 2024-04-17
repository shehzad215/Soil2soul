<?php
App::uses('OurJourneyInclusion', 'Model');

/**
 * OurJourneyInclusion Test Case
 *
 */
class OurJourneyInclusionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_journey_inclusion',
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
		$this->OurJourneyInclusion = ClassRegistry::init('OurJourneyInclusion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurJourneyInclusion);

		parent::tearDown();
	}

}
