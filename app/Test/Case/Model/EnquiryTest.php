<?php
App::uses('Enquiry', 'Model');

/**
 * Enquiry Test Case
 *
 */
class EnquiryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enquiry',
		'app.plan',
		'app.location',
		'app.location_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enquiry = ClassRegistry::init('Enquiry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enquiry);

		parent::tearDown();
	}

}
