<?php
App::uses('AwardAndCertificate', 'Model');

/**
 * AwardAndCertificate Test Case
 *
 */
class AwardAndCertificateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.award_and_certificate',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AwardAndCertificate = ClassRegistry::init('AwardAndCertificate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AwardAndCertificate);

		parent::tearDown();
	}

}
