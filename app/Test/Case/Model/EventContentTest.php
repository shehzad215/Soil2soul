<?php
App::uses('EventContent', 'Model');

/**
 * EventContent Test Case
 *
 */
class EventContentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_content',
		'app.event',
		'app.event_content_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventContent = ClassRegistry::init('EventContent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventContent);

		parent::tearDown();
	}

}
