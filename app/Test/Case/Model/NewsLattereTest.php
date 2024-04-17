<?php
App::uses('NewsLattere', 'Model');

/**
 * NewsLattere Test Case
 *
 */
class NewsLattereTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.news_lattere',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NewsLattere = ClassRegistry::init('NewsLattere');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NewsLattere);

		parent::tearDown();
	}

}
