<?php
App::uses('StudentAchivement', 'Model');

/**
 * StudentAchivement Test Case
 *
 */
class StudentAchivementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student_achivement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudentAchivement = ClassRegistry::init('StudentAchivement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentAchivement);

		parent::tearDown();
	}

}
