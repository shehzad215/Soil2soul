<?php
App::uses('AffiliatedAttachment', 'Model');

/**
 * AffiliatedAttachment Test Case
 *
 */
class AffiliatedAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.affiliated_attachment',
		'app.affiliated'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AffiliatedAttachment = ClassRegistry::init('AffiliatedAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AffiliatedAttachment);

		parent::tearDown();
	}

}
