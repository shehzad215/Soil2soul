<?php
App::uses('AppModel', 'Model');
/**
 * PostImage Model
 *
 * @property Post $Post
 */
class PostImage extends AppModel {

	public $actsAs = array(
		'Containable',
			'Upload.Upload' => array(
				'image_file'
		)
	);
/**
 * Order rule
 *
 * @var array
 */
	public $order = array("PostImage.title"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a valid Post',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
