<?php
App::uses('AppModel', 'Model');
/**
 * MenuLinksRole Model
 *
 * @property MenuLink $MenuLink
 * @property Role $Role
 */
class MenuLinksRole extends AppModel {

	public $actsAs = array('Containable');
/**
 * Order rule
 *
 * @var array
 */
	//public $order = array("MenuLinksRole.id"=>"ASC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'menu_link_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a valid Menu Link',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a valid Role',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MenuLink' => array(
			'className' => 'MenuLink',
			'foreignKey' => 'menu_link_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
