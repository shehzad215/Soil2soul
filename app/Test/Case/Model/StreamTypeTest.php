<?php
App::uses('StreamType', 'Model');

/**
 * StreamType Test Case
 *
 */
class StreamTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stream_type',
		'app.subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StreamType = ClassRegistry::init('StreamType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StreamType);

		parent::tearDown();
	}

}
