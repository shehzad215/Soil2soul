<?php
App::uses('EventOrganizer', 'Model');

/**
 * EventOrganizer Test Case
 *
 */
class EventOrganizerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_organizer',
		'app.event_organizer_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventOrganizer = ClassRegistry::init('EventOrganizer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventOrganizer);

		parent::tearDown();
	}

}
