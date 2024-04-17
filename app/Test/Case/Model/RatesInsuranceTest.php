<?php
App::uses('RatesInsurance', 'Model');

/**
 * RatesInsurance Test Case
 *
 */
class RatesInsuranceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rates_insurance'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RatesInsurance = ClassRegistry::init('RatesInsurance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RatesInsurance);

		parent::tearDown();
	}

}
