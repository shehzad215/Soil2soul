<?php
App::uses('CorporateMaster', 'Model');

/**
 * CorporateMaster Test Case
 *
 */
class CorporateMasterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.corporate_master',
		'app.corporate_email',
		'app.corporate_markup',
		'app.corporate_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CorporateMaster = ClassRegistry::init('CorporateMaster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CorporateMaster);

		parent::tearDown();
	}

}
