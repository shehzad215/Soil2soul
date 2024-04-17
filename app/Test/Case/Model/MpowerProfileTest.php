<?php
App::uses('MpowerProfile', 'Model');

/**
 * MpowerProfile Test Case
 *
 */
class MpowerProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mpower_profile',
		'app.mpower',
		'app.user',
		'app.mpower_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MpowerProfile = ClassRegistry::init('MpowerProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MpowerProfile);

		parent::tearDown();
	}

}
