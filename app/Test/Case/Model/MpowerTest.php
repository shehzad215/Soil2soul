<?php
App::uses('Mpower', 'Model');

/**
 * Mpower Test Case
 *
 */
class MpowerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mpower',
		'app.user',
		'app.mpower_image',
		'app.mpower_profile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mpower = ClassRegistry::init('Mpower');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mpower);

		parent::tearDown();
	}

}
