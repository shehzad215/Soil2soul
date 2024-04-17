<?php
App::uses('AdmissionFeeStructure', 'Model');

/**
 * AdmissionFeeStructure Test Case
 *
 */
class AdmissionFeeStructureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.admission_fee_structure',
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
		$this->AdmissionFeeStructure = ClassRegistry::init('AdmissionFeeStructure');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdmissionFeeStructure);

		parent::tearDown();
	}

}
