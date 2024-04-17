<?php
App::uses('OurPartner', 'Model');

/**
 * OurPartner Test Case
 *
 */
class OurPartnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.our_partner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OurPartner = ClassRegistry::init('OurPartner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OurPartner);

		parent::tearDown();
	}

}
