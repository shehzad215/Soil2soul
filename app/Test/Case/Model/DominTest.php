<?php
App::uses('Domin', 'Model');

/**
 * Domin Test Case
 *
 */
class DominTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.domin',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.designation',
		'app.staffe',
		'app.salutation',
		'app.department',
		'app.sub_department',
		'app.staff_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Domin = ClassRegistry::init('Domin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Domin);

		parent::tearDown();
	}

}
