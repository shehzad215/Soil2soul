<?php
App::uses('EmailSubscription', 'Model');

/**
 * EmailSubscription Test Case
 *
 */
class EmailSubscriptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.email_subscription'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmailSubscription = ClassRegistry::init('EmailSubscription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmailSubscription);

		parent::tearDown();
	}

}
