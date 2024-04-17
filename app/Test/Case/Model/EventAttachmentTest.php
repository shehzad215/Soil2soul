<?php
App::uses('EventAttachment', 'Model');

/**
 * EventAttachment Test Case
 *
 */
class EventAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_attachment',
		'app.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventAttachment = ClassRegistry::init('EventAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventAttachment);

		parent::tearDown();
	}

}
