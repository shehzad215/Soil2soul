<?php
App::uses('Academic', 'Model');

/**
 * Academic Test Case
 *
 */
class AcademicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.academic',
		'app.subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Academic = ClassRegistry::init('Academic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Academic);

		parent::tearDown();
	}

}
