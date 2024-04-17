<?php
App::uses('EventPublication', 'Model');

/**
 * EventPublication Test Case
 *
 */
class EventPublicationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_publication'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventPublication = ClassRegistry::init('EventPublication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventPublication);

		parent::tearDown();
	}

}
