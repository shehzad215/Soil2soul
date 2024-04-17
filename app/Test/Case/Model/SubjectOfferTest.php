<?php
App::uses('SubjectOffer', 'Model');

/**
 * SubjectOffer Test Case
 *
 */
class SubjectOfferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subject_offer',
		'app.subject',
		'app.academic',
		'app.stream',
		'app.stream_type',
		'app.user',
		'app.faculty',
		'app.subject_achivement',
		'app.subject_achivement_type',
		'app.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectOffer = ClassRegistry::init('SubjectOffer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectOffer);

		parent::tearDown();
	}

}
