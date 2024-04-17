<?php
App::uses('BlogComment', 'Model');

/**
 * BlogComment Test Case
 *
 */
class BlogCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blog_comment',
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
		$this->BlogComment = ClassRegistry::init('BlogComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogComment);

		parent::tearDown();
	}

}
