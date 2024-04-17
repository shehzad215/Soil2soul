<?php
App::uses('Salutation', 'Model');

/**
 * Salutation Test Case
 *
 */
class SalutationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.salutation',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.designation',
		'app.staffe'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Salutation = ClassRegistry::init('Salutation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Salutation);

		parent::tearDown();
	}

}
