<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 */
class Page extends AppModel {

	public $actsAs = array(
		'Containable',
        'Upload.Upload' => array(
            'image_file','attachment'
        )
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
	public $order = array("Page.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


}
