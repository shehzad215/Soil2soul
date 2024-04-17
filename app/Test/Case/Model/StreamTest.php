<?php
App::uses('Stream', 'Model');

/**
 * Stream Test Case
 *
 */
class StreamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stream',
		'app.subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stream = ClassRegistry::init('Stream');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stream);

		parent::tearDown();
	}

}
