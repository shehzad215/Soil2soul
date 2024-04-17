<?php
App::uses('OrderAttractionContact', 'Model');

/**
 * OrderAttractionContact Test Case
 *
 */
class OrderAttractionContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_attraction_contact',
		'app.order',
		'app.order_attraction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderAttractionContact = ClassRegistry::init('OrderAttractionContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderAttractionContact);

		parent::tearDown();
	}

}
