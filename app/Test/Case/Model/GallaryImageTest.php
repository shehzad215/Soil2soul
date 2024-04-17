<?php
App::uses('GallaryImage', 'Model');

/**
 * GallaryImage Test Case
 *
 */
class GallaryImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gallary_image',
		'app.photo_gallery',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GallaryImage = ClassRegistry::init('GallaryImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GallaryImage);

		parent::tearDown();
	}

}
