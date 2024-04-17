<?php
App::uses('BookWithUs', 'Model');

/**
 * BookWithUs Test Case
 *
 */
class BookWithUsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book_with_us'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookWithUs = ClassRegistry::init('BookWithUs');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookWithUs);

		parent::tearDown();
	}

}
