<?php
App::uses('AppModel', 'Model');
/**
 * Blog Model
 *
 */
class Blog extends AppModel {

	public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'main_image','small_image'
		]
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("Blog.id"=>"DESC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'blog_category_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Blog category',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blog_author_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Blog Author',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blog_date' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid blog_date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

public $belongsTo = array(
		'BlogCategory' => array(
			'className' => 'BlogCategory',
			'foreignKey' => 'blog_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BlogAuthor' => array(
			'className' => 'BlogAuthor',
			'foreignKey' => 'blog_author_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BlogComment' => array(
			'className' => 'BlogComment',
			'foreignKey' => 'blog_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BlogView' => array(
			'className' => 'BlogView',
			'foreignKey' => 'blog_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

public $hasAndBelongsToMany = array(
	'BlogTag' => array(
		'className' => 'BlogTag',
		'joinTable' => 'blogs_blog_tags',
		'foreignKey' => 'blog_id',
		'associationForeignKey' => 'blog_tag_id',
		'unique' => 'keepExisting',
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
	)
);
}
