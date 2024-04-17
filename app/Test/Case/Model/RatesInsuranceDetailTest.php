<?php
App::uses('RatesInsuranceDetail', 'Model');

/**
 * RatesInsuranceDetail Test Case
 *
 */
class RatesInsuranceDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rates_insurance_detail',
		'app.rates_insurance'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RatesInsuranceDetail = ClassRegistry::init('RatesInsuranceDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RatesInsuranceDetail);

		parent::tearDown();
	}

}
