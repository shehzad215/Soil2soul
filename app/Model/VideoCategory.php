<?php
App::uses('AppModel', 'Model');
/**
 * VideoCategory Model
 *
 */
class VideoCategory extends AppModel {

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
	public $displayField = 'name';

/**
 * Order rule
 *
 * @var array
 */
	public $order = array("VideoCategory.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Order',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username already present.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		),
	);

	public $hasMany = array(
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'video_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
);

}
