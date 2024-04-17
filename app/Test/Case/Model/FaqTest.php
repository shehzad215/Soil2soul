<?php
App::uses('Faq', 'Model');

/**
 * Faq Test Case
 *
 */
class FaqTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.faq',
		'app.our_journy',
		'app.curency',
		'app.amenity',
		'app.amenities_our_journy',
		'app.our_team',
		'app.our_teams_our_journy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Faq = ClassRegistry::init('Faq');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Faq);

		parent::tearDown();
	}

}
