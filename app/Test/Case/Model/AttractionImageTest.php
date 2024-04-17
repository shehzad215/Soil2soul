<?php
App::uses('AttractionImage', 'Model');

/**
 * AttractionImage Test Case
 *
 */
class AttractionImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_image',
		'app.attraction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionImage = ClassRegistry::init('AttractionImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionImage);

		parent::tearDown();
	}

}
