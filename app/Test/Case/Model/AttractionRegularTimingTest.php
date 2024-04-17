<?php
App::uses('AttractionRegularTiming', 'Model');

/**
 * AttractionRegularTiming Test Case
 *
 */
class AttractionRegularTimingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_regular_timing',
		'app.attraction',
		'app.week_day'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionRegularTiming = ClassRegistry::init('AttractionRegularTiming');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionRegularTiming);

		parent::tearDown();
	}

}
