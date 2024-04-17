<?php
App::uses('DiffrentFeature', 'Model');

/**
 * DiffrentFeature Test Case
 *
 */
class DiffrentFeatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diffrent_feature',
		'app.diffrent_feature_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DiffrentFeature = ClassRegistry::init('DiffrentFeature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DiffrentFeature);

		parent::tearDown();
	}

}
