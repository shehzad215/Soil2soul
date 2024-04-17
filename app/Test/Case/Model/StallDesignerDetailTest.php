<?php
App::uses('StallDesignerDetail', 'Model');

/**
 * StallDesignerDetail Test Case
 *
 */
class StallDesignerDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stall_designer_detail',
		'app.stall_designer',
		'app.stall_designer_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StallDesignerDetail = ClassRegistry::init('StallDesignerDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StallDesignerDetail);

		parent::tearDown();
	}

}
