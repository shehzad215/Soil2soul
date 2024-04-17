<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 */
class Video extends AppModel {

	public $actsAs = array(
            'Containable',
            'Upload.Upload'=>[
                'image_file'
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
	public $order = array("Video.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'video_category_id' => array(
		// 	'notBlank' => array(
		// 		'rule' => array('notBlank'),
		// 		'message' => 'Please enter a valid video_category_id',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// )
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

public $belongsTo = array(
		'VideoCategory' => array(
			'className' => 'VideoCategory',
			'foreignKey' => 'video_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
);

public $hasAndBelongsToMany = array(
	'BlogTag' => array(
		'className' => 'BlogTag',
		'joinTable' => 'videos_blog_tags',
		'foreignKey' => 'video_id',
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
