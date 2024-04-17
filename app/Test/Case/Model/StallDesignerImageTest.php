<?php
App::uses('StallDesignerImage', 'Model');

/**
 * StallDesignerImage Test Case
 *
 */
class StallDesignerImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stall_designer_image',
		'app.stall_designer',
		'app.stall_designer_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StallDesignerImage = ClassRegistry::init('StallDesignerImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StallDesignerImage);

		parent::tearDown();
	}

}
