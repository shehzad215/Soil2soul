<?php
App::uses('AsiaTravelApiTourOption', 'Model');

/**
 * AsiaTravelApiTourOption Test Case
 *
 */
class AsiaTravelApiTourOptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asia_travel_api_tour_option'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AsiaTravelApiTourOption = ClassRegistry::init('AsiaTravelApiTourOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AsiaTravelApiTourOption);

		parent::tearDown();
	}

}
