<?php
App::uses('JourneyImage', 'Model');

/**
 * JourneyImage Test Case
 *
 */
class JourneyImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.journey_image',
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
		$this->JourneyImage = ClassRegistry::init('JourneyImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JourneyImage);

		parent::tearDown();
	}

}
