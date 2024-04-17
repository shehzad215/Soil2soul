<?php
App::uses('BookWith', 'Model');

/**
 * BookWith Test Case
 *
 */
class BookWithTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book_with',
		'app.test'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookWith = ClassRegistry::init('BookWith');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookWith);

		parent::tearDown();
	}

}
