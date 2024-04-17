<?php
App::uses('BudgetType', 'Model');

/**
 * BudgetType Test Case
 *
 */
class BudgetTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.budget_type',
		'app.budget_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BudgetType = ClassRegistry::init('BudgetType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BudgetType);

		parent::tearDown();
	}

}
