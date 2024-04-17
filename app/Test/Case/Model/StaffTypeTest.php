<?php
App::uses('StaffType', 'Model');

/**
 * StaffType Test Case
 *
 */
class StaffTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.staff_type',
		'app.staffe',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.designation',
		'app.salutation',
		'app.department',
		'app.sub_department'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StaffType = ClassRegistry::init('StaffType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffType);

		parent::tearDown();
	}

}
