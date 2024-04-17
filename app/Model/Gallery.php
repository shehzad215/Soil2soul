<?php
App::uses('AppModel', 'Model');
/**
 * Gallery Model
 *
 * @property GalleryCategory $GalleryCategory
 */
class Gallery extends AppModel {

		public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'image'
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
	public $order = array("Gallery.order"=>"ASC");
	
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
		/*'order' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Order',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
		// 'isUnique' => array(
		// 		'rule' => array('isUnique'),
		// 		'message' => 'Username already present.',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),	
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'GalleryCategory' => array(
			'className' => 'GalleryCategory',
			'foreignKey' => 'gallery_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
