<?php
App::uses('SubjectAchivementType', 'Model');

/**
 * SubjectAchivementType Test Case
 *
 */
class SubjectAchivementTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subject_achivement_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectAchivementType = ClassRegistry::init('SubjectAchivementType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectAchivementType);

		parent::tearDown();
	}

}
