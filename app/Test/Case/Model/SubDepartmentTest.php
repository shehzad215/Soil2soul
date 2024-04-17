<?php
App::uses('SubDepartment', 'Model');

/**
 * SubDepartment Test Case
 *
 */
class SubDepartmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sub_department',
		'app.department',
		'app.staffe',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.designation',
		'app.salutation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubDepartment = ClassRegistry::init('SubDepartment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubDepartment);

		parent::tearDown();
	}

}
