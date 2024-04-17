<?php
App::uses('OfferingPricing', 'Model');

/**
 * OfferingPricing Test Case
 *
 */
class OfferingPricingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.offering_pricing',
		'app.location',
		'app.location_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfferingPricing = ClassRegistry::init('OfferingPricing');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfferingPricing);

		parent::tearDown();
	}

}
