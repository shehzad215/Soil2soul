<?php
App::uses('ApplyPost', 'Model');

/**
 * ApplyPost Test Case
 *
 */
class ApplyPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.apply_post',
		'app.career_non_teaching'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ApplyPost = ClassRegistry::init('ApplyPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ApplyPost);

		parent::tearDown();
	}

}
