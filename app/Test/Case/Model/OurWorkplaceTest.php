<?php
App::uses('OurWorkplace', 'Model');

/**
 * OurWorkplace Test Case
 *
 */
class OurWorkplaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_workplace'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OurWorkplace = ClassRegistry::init('OurWorkplace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurWorkplace);

		parent::tearDown();
	}

}
