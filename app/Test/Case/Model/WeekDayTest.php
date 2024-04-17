<?php
App::uses('Weekday', 'Model');

/**
 * Weekday Test Case
 *
 */
class WeekdayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.weekday',
		'app.appointment',
		'app.appointments_weekday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Weekday = ClassRegistry::init('Weekday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Weekday);

		parent::tearDown();
	}

}
