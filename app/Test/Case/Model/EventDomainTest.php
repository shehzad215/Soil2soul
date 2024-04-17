<?php
App::uses('EventDomain', 'Model');

/**
 * EventDomain Test Case
 *
 */
class EventDomainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_domain'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventDomain = ClassRegistry::init('EventDomain');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventDomain);

		parent::tearDown();
	}

}
