<?php
App::uses('RateInsuranceDetail', 'Model');

/**
 * RateInsuranceDetail Test Case
 *
 */
class RateInsuranceDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rate_insurance_detail',
		'app.rate_insurance'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RateInsuranceDetail = ClassRegistry::init('RateInsuranceDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RateInsuranceDetail);

		parent::tearDown();
	}

}
