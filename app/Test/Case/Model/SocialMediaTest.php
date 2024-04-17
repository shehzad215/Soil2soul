<?php
App::uses('SocialMedia', 'Model');

/**
 * SocialMedia Test Case
 *
 */
class SocialMediaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.social_media'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SocialMedia = ClassRegistry::init('SocialMedia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SocialMedia);

		parent::tearDown();
	}

}
