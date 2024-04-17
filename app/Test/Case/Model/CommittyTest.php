<?php
App::uses('Committy', 'Model');

/**
 * Committy Test Case
 *
 */
class CommittyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.committy',
		'app.user',
		'app.committy_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Committy = ClassRegistry::init('Committy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Committy);

		parent::tearDown();
	}

}
