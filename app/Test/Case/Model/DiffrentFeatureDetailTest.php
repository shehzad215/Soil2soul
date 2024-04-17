<?php
App::uses('DiffrentFeatureDetail', 'Model');

/**
 * DiffrentFeatureDetail Test Case
 *
 */
class DiffrentFeatureDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diffrent_feature_detail',
		'app.diffrent_feature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DiffrentFeatureDetail = ClassRegistry::init('DiffrentFeatureDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DiffrentFeatureDetail);

		parent::tearDown();
	}

}
