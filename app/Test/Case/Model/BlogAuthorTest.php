<?php
App::uses('BlogAuthor', 'Model');

/**
 * BlogAuthor Test Case
 *
 */
class BlogAuthorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blog_author',
		'app.blog',
		'app.blog_category',
		'app.user',
		'app.role',
		'app.menu_link',
		'app.menu',
		'app.menu_links_role',
		'app.menu_links_user',
		'app.salutation',
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
		$this->BlogAuthor = ClassRegistry::init('BlogAuthor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogAuthor);

		parent::tearDown();
	}

}
