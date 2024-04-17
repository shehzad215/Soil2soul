<?php
App::uses('OurJourneyExlusion', 'Model');

/**
 * OurJourneyExlusion Test Case
 *
 */
class OurJourneyExlusionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_journey_exlusion',
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
		$this->OurJourneyExlusion = ClassRegistry::init('OurJourneyExlusion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurJourneyExlusion);

		parent::tearDown();
	}

}
