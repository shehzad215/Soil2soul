<?php
App::uses('LanguageWrite', 'Model');

/**
 * LanguageWrite Test Case
 *
 */
class LanguageWriteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.language_write',
		'app.career_non_teaching',
		'app.apply_post',
		'app.academic_record',
		'app.training',
		'app.language',
		'app.languages_read'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LanguageWrite = ClassRegistry::init('LanguageWrite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LanguageWrite);

		parent::tearDown();
	}

}
