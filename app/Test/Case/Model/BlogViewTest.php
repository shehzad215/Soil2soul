<?php
App::uses('BlogView', 'Model');

/**
 * BlogView Test Case
 *
 */
class BlogViewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blog_view',
		'app.blog',
		'app.blog_category',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.salutation',
		'app.blog_author',
		'app.blog_comment',
		'app.blog_tag',
		'app.blogs_blog_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogView = ClassRegistry::init('BlogView');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogView);

		parent::tearDown();
	}

}
