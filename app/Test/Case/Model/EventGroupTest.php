<?php
App::uses('EventGroup', 'Model');

/**
 * EventGroup Test Case
 *
 */
class EventGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_group',
		'app.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventGroup = ClassRegistry::init('EventGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventGroup);

		parent::tearDown();
	}

}
