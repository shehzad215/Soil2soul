<?php
App::uses('CrmPreEnquiryType', 'Model');

/**
 * CrmPreEnquiryType Test Case
 *
 */
class CrmPreEnquiryTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.crm_pre_enquiry_type',
		'app.pre_enquiry_transfer_receive_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrmPreEnquiryType = ClassRegistry::init('CrmPreEnquiryType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrmPreEnquiryType);

		parent::tearDown();
	}

}
