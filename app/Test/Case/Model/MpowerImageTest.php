<?php
App::uses('MpowerImage', 'Model');

/**
 * MpowerImage Test Case
 *
 */
class MpowerImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mpower_image',
		'app.mpower',
		'app.user',
		'app.mpower_profile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MpowerImage = ClassRegistry::init('MpowerImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MpowerImage);

		parent::tearDown();
	}

}
