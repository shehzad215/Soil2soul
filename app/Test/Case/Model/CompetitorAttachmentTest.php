<?php
App::uses('CompetitorAttachment', 'Model');

/**
 * CompetitorAttachment Test Case
 *
 */
class CompetitorAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.competitor_attachment',
		'app.competitor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompetitorAttachment = ClassRegistry::init('CompetitorAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitorAttachment);

		parent::tearDown();
	}

}
