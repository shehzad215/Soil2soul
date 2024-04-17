<?php
App::uses('TourCostType', 'Model');

/**
 * TourCostType Test Case
 *
 */
class TourCostTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tour_cost_type',
		'app.tour_cost',
		'app.our_journy',
		'app.currency',
		'app.faq',
		'app.journey_image',
		'app.our_journey_exlusion',
		'app.our_journey_inclusion',
		'app.our_journey_itenery',
		'app.our_journey_departure',
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
		$this->TourCostType = ClassRegistry::init('TourCostType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TourCostType);

		parent::tearDown();
	}

}
