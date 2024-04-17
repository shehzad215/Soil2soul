<?php
App::uses('OrderAttractionImage', 'Model');

/**
 * OrderAttractionImage Test Case
 *
 */
class OrderAttractionImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_attraction_image',
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
		$this->OrderAttractionImage = ClassRegistry::init('OrderAttractionImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderAttractionImage);

		parent::tearDown();
	}

}
