<?php
App::uses('Package', 'Model');

/**
 * Package Test Case
 *
 */
class PackageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.package',
		'app.our_journy',
		'app.currency',
		'app.faq',
		'app.faq_type',
		'app.journey_image',
		'app.our_journey_exlusion',
		'app.our_journey_inclusion',
		'app.our_journey_itenery',
		'app.tour_cost',
		'app.tour_cost_detail',
		'app.tour_cost_type',
		'app.tour_glimpse',
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
		$this->Package = ClassRegistry::init('Package');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Package);

		parent::tearDown();
	}

}
