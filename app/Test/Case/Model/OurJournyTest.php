<?php
App::uses('OurJourny', 'Model');

/**
 * OurJourny Test Case
 *
 */
class OurJournyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->OurJourny = ClassRegistry::init('OurJourny');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurJourny);

		parent::tearDown();
	}

}
