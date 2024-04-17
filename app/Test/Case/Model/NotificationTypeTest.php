<?php
App::uses('NotificationType', 'Model');

/**
 * NotificationType Test Case
 *
 */
class NotificationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.notification_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NotificationType = ClassRegistry::init('NotificationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NotificationType);

		parent::tearDown();
	}

}
