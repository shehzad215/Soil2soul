<?php
App::uses('StallDesignersCountry', 'Model');

/**
 * StallDesignersCountry Test Case
 *
 */
class StallDesignersCountryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stall_designers_country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StallDesignersCountry = ClassRegistry::init('StallDesignersCountry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StallDesignersCountry);

		parent::tearDown();
	}

}
