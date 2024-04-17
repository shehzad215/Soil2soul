<?php
App::uses('StallDesigner', 'Model');

/**
 * StallDesigner Test Case
 *
 */
class StallDesignerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stall_designer',
		'app.stall_designer_detail',
		'app.stall_designer_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StallDesigner = ClassRegistry::init('StallDesigner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StallDesigner);

		parent::tearDown();
	}

}
