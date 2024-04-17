<?php
App::uses('LanguagesRead', 'Model');

/**
 * LanguagesRead Test Case
 *
 */
class LanguagesReadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.languages_read',
		'app.career_non_teaching',
		'app.apply_post',
		'app.academic_record',
		'app.training',
		'app.language'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LanguagesRead = ClassRegistry::init('LanguagesRead');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LanguagesRead);

		parent::tearDown();
	}

}
