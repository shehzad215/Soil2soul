<?php
App::uses('PhotoGallery', 'Model');

/**
 * PhotoGallery Test Case
 *
 */
class PhotoGalleryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.photo_gallery',
		'app.user',
		'app.gallary_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PhotoGallery = ClassRegistry::init('PhotoGallery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PhotoGallery);

		parent::tearDown();
	}

}
