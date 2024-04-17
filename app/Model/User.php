<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property Designation $Designation
 * @property CreatedBy $CreatedBy
 * @property MenuLink $MenuLink
 */
class User extends AppModel {

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
	public $order = array("User.id"=>"DESC");
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Username',
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
		'email' => array(
			'notBlank' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email ID already present.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_no' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid contact_no',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email ID already contact_no.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid Password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid role',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid First Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid First Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'salutation_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid First Name',
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
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Salutation' => array(
			'className' => 'Salutation',
			'foreignKey' => 'salutation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	/* 'Designation' => array(
	    	'className' => 'Designation',
			'foreignKey' => 'designations_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
	),*/
);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'MenuLink' => array(
			'className' => 'MenuLink',
			'joinTable' => 'menu_links_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'menu_link_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


	public function beforeFind($query) {
		$this->params = Router::getParams();
		if(AuthComponent::user("Role.super_config") === false) {
			// Disallow non super_config roles to see other organizations details
			
			// $fieldName = $this->alias.'.organization_id';
			// $query['conditions'][$fieldName] = AuthComponent::user("organization_id");
			
			if(AuthComponent::user("Role.config") === false) {
				// Disallow non super_config & config role users to modify other user details
				$fieldName = $this->alias.'.id';
				
				switch($this->params['action']) {
					case 'index': case 'view': case 'add': case 'edit': case 'delete':
						$query['conditions'][$fieldName] = AuthComponent::user("id");
					break;
				}
			}
		}
		return $query;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	public function afterSave($created, $options = array()) {
		if(!$created) {
			if(AuthComponent::user('id') == $this->data['User']['id']) {
				$userTemp = $this->find('first', array('contain'=>array('Role'), 'conditions' => array('User.id' => $this->data['User']['id'])));
				unset($userTemp['User']['password']);
				$user = $userTemp['User'];
				/*$user['Organization'] = $userTemp['Organization'];*/
				$user['Role'] = $userTemp['Role'];
				
				CakeSession::write('Auth.User', $user);
				$this->resetRoles();
			}
		}
		parent::afterSave($created, $options = array());
	}
	
	public function resetRoles() {
		// Users role management and initialization
		$userRole = AuthComponent::user('Role');
		$checkAccesses = array('add'=>false, 'edit'=>false, 'delete'=>false);
		foreach($checkAccesses as $role=>$roleValue) {
			foreach($userRole as $field=>$value) {
				if (preg_match("/_$role/", $field)) {
					if(!empty($value)) {
						$checkAccesses[$role] = true;
					}
				}
			}
		}
		CakeSession::write('Auth.User.Role', array_merge(AuthComponent::user('Role'), $checkAccesses));
	}
	
	public function generateRandString($length) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars),0,$length);
	}

}
