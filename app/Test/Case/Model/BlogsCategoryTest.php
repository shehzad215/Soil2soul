<?php
App::uses('BlogsCategory', 'Model');

/**
 * BlogsCategory Test Case
 *
 */
class BlogsCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blogs_category',
		'app.post',
		'app.template_layout',
		'app.post_image',
		'app.blog_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogsCategory = ClassRegistry::init('BlogsCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogsCategory);

		parent::tearDown();
	}

}
