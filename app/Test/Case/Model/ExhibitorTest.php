<?php
App::uses('Exhibitor', 'Model');

/**
 * Exhibitor Test Case
 *
 */
class ExhibitorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.exhibitor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Exhibitor = ClassRegistry::init('Exhibitor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Exhibitor);

		parent::tearDown();
	}

}
