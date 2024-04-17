<?php
App::uses('BirlaInstitute', 'Model');

/**
 * BirlaInstitute Test Case
 *
 */
class BirlaInstituteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.birla_institute'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BirlaInstitute = ClassRegistry::init('BirlaInstitute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BirlaInstitute);

		parent::tearDown();
	}

}
