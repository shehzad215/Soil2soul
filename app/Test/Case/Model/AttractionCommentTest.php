<?php
App::uses('AttractionComment', 'Model');

/**
 * AttractionComment Test Case
 *
 */
class AttractionCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attraction_comment',
		'app.attraction',
		'app.attraction_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttractionComment = ClassRegistry::init('AttractionComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttractionComment);

		parent::tearDown();
	}

}
