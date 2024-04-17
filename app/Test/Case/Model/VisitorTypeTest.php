<?php
App::uses('VisitorType', 'Model');

/**
 * VisitorType Test Case
 *
 */
class VisitorTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.visitor_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VisitorType = ClassRegistry::init('VisitorType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VisitorType);

		parent::tearDown();
	}

}
