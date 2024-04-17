<?php
App::uses('MarketNews', 'Model');

/**
 * MarketNews Test Case
 *
 */
class MarketNewsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.market_news',
		'app.supplier',
		'app.competitor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MarketNews = ClassRegistry::init('MarketNews');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MarketNews);

		parent::tearDown();
	}

}
