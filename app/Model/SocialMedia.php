<?php
App::uses('AppModel', 'Model');
/**
 * SocialMedia Model
 *
 */
class SocialMedia extends AppModel {

		public $actsAs = array(
		'Containable',
		'Upload.Upload'=>[
			'image_file'
		]
	);
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'social_medias';

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
	public $order = array("SocialMedia.id"=>"ASC");
	
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
/*		'icon_class' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Icon Class',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);


}
