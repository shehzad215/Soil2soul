<?php
App::uses('ProductSubtype', 'Model');

/**
 * ProductSubtype Test Case
 *
 */
class ProductSubtypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_subtype',
		'app.product_type',
		'app.product',
		'app.product_domain',
		'app.competitor',
		'app.product_attachment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductSubtype = ClassRegistry::init('ProductSubtype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductSubtype);

		parent::tearDown();
	}

}
