<?php
App::uses('AppModel', 'Model');
/**
 * BookingFacility Model
 *
 */
class BookingFacility extends AppModel {

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
	public $order = array("BookingFacility.id"=>"ASC");
	
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
		'class' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Class',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);



}
