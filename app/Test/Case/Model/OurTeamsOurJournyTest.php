<?php
App::uses('OurTeamsOurJourny', 'Model');

/**
 * OurTeamsOurJourny Test Case
 *
 */
class OurTeamsOurJournyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_teams_our_journy',
		'app.our_team',
		'app.our_journy',
		'app.curency',
		'app.amenity',
		'app.amenities_our_journy',
		'app.our_journey'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OurTeamsOurJourny = ClassRegistry::init('OurTeamsOurJourny');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurTeamsOurJourny);

		parent::tearDown();
	}

}
