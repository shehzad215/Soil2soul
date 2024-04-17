<?php
App::uses('AttractionContact', 'Model');

/**
 * AttractionContact Test Case
 *
 */
class AttractionContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_contact',
		'app.attraction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionContact = ClassRegistry::init('AttractionContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionContact);

		parent::tearDown();
	}

}
