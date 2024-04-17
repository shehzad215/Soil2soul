<?php
App::uses('AppModel', 'Model');
/**
 * BlogsBlogTag Model
 *
 * @property Blog $Blog
 * @property BlogTag $BlogTag
 */
class BlogsBlogTag extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	public $order = array();
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Blog' => array(
			'className' => 'Blog',
			'foreignKey' => 'blog_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BlogTag' => array(
			'className' => 'BlogTag',
			'foreignKey' => 'blog_tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
