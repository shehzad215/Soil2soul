<?php
App::uses('TemplateLayout', 'Model');

/**
 * TemplateLayout Test Case
 *
 */
class TemplateLayoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.template_layout',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TemplateLayout = ClassRegistry::init('TemplateLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TemplateLayout);

		parent::tearDown();
	}

}
