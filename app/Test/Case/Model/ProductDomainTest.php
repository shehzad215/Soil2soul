<?php
App::uses('ProductDomain', 'Model');

/**
 * ProductDomain Test Case
 *
 */
class ProductDomainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_domain',
		'app.product',
		'app.product_type',
		'app.product_subtype',
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
		$this->ProductDomain = ClassRegistry::init('ProductDomain');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductDomain);

		parent::tearDown();
	}

}
