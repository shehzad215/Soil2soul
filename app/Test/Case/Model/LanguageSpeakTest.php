<?php
App::uses('LanguageSpeak', 'Model');

/**
 * LanguageSpeak Test Case
 *
 */
class LanguageSpeakTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.language_speak',
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
		$this->LanguageSpeak = ClassRegistry::init('LanguageSpeak');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LanguageSpeak);

		parent::tearDown();
	}

}
