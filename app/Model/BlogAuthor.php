<?php
App::uses('AppModel', 'Model');
/**
 * BlogAuthor Model
 *
 * @property Blog $Blog
 */
class BlogAuthor extends AppModel {

	public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'author_image'
		]
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("BlogAuthor.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'author_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid author_name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Blog' => array(
			'className' => 'Blog',
			'foreignKey' => 'blog_author_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);



}
