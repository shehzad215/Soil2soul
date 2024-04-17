<?php
App::uses('Achivement', 'Model');

/**
 * Achivement Test Case
 *
 */
class AchivementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.achivement',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Achivement = ClassRegistry::init('Achivement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Achivement);

		parent::tearDown();
	}

}
