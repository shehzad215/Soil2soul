<?php
App::uses('RateInsurance', 'Model');

/**
 * RateInsurance Test Case
 *
 */
class RateInsuranceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rate_insurance',
		'app.rate_insurance_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RateInsurance = ClassRegistry::init('RateInsurance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RateInsurance);

		parent::tearDown();
	}

}
