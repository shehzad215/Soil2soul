<?php
App::uses('TourCostDetail', 'Model');

/**
 * TourCostDetail Test Case
 *
 */
class TourCostDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tour_cost_detail',
		'app.our_journy',
		'app.currency',
		'app.faq',
		'app.journey_image',
		'app.our_journey_exlusion',
		'app.our_journey_inclusion',
		'app.our_journey_itenery',
		'app.tour_cost',
		'app.tour_glimpse',
		'app.amenity',
		'app.amenities_our_journy',
		'app.our_team',
		'app.our_teams_our_journy',
		'app.tour_cost_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TourCostDetail = ClassRegistry::init('TourCostDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TourCostDetail);

		parent::tearDown();
	}

}
