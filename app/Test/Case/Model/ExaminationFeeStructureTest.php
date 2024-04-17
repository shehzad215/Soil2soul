<?php
App::uses('ExaminationFeeStructure', 'Model');

/**
 * ExaminationFeeStructure Test Case
 *
 */
class ExaminationFeeStructureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.examination_fee_structure',
		'app.academic_year',
		'app.notice',
		'app.user',
		'app.notification_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExaminationFeeStructure = ClassRegistry::init('ExaminationFeeStructure');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExaminationFeeStructure);

		parent::tearDown();
	}

}
