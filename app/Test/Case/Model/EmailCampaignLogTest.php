<?php
App::uses('EmailCampaignLog', 'Model');

/**
 * EmailCampaignLog Test Case
 *
 */
class EmailCampaignLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.email_campaign_log',
		'app.email_campaign',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmailCampaignLog = ClassRegistry::init('EmailCampaignLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmailCampaignLog);

		parent::tearDown();
	}

}
