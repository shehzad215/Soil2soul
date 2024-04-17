<?php
App::uses('ProductAttachment', 'Model');

/**
 * ProductAttachment Test Case
 *
 */
class ProductAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_attachment',
		'app.product',
		'app.product_domain',
		'app.product_type',
		'app.product_subtype',
		'app.competitor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductAttachment = ClassRegistry::init('ProductAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductAttachment);

		parent::tearDown();
	}

}
