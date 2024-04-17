<?php
App::uses('CompetitorProduct', 'Model');

/**
 * CompetitorProduct Test Case
 *
 */
class CompetitorProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.competitor_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompetitorProduct = ClassRegistry::init('CompetitorProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitorProduct);

		parent::tearDown();
	}

}
