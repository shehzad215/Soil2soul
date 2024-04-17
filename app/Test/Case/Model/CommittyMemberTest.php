<?php
App::uses('CommittyMember', 'Model');

/**
 * CommittyMember Test Case
 *
 */
class CommittyMemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.committy_member',
		'app.committy',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommittyMember = ClassRegistry::init('CommittyMember');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommittyMember);

		parent::tearDown();
	}

}
