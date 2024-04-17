<?php
App::uses('FinancialYear', 'Model');

/**
 * FinancialYear Test Case
 *
 */
class FinancialYearTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.financial_year'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FinancialYear = ClassRegistry::init('FinancialYear');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FinancialYear);

		parent::tearDown();
	}

}
