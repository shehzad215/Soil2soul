<?php
App::uses('EventContentCategory', 'Model');

/**
 * EventContentCategory Test Case
 *
 */
class EventContentCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_content_category',
		'app.event_content'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventContentCategory = ClassRegistry::init('EventContentCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventContentCategory);

		parent::tearDown();
	}

}
