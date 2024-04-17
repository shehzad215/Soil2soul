<?php
App::uses('MeetingType', 'Model');

/**
 * MeetingType Test Case
 *
 */
class MeetingTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meeting_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MeetingType = ClassRegistry::init('MeetingType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeetingType);

		parent::tearDown();
	}

}
