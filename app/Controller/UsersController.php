<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/*
* beforeFilter method
*/
function beforeFilter() {
	parent::beforeFilter();
	$this->layout = 'admin';
	$this->set('enableAjax', false);
	$this->Auth->allow('admin_forgot_password');
}
/**
/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$usersid = trim($this->request->data['usersid']);

	// debug($serviceId);exit;

	 if (!empty($usersid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->User->id = $usersid;
       	 if ($this->User->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = $option1 =  array();
		$conditions = $conditions1 = array();
		$conditions = ['User.role_id !='=>2];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		// debug($conditions);
		$options['contain'] = ['Role'];
		
		$this->User->recursive = 0;
		$this->paginate = $options;
		$this->set('users', $this->paginate('User'));
		$this->set('_serialize', array('users'));

		$userData = $this->User->find('all',['conditions'=>$conditions,'contain'=>false]);

		// debug($userData);exit;

		/*For UserName DropDown*/
		$usernameArr = $nameArr = $contactNoArr = [];
		foreach ($userData as $key => $value) {
			$usernameArr[$value['User']['username']] = $value['User']['username']; 
			$nameArr[$value['User']['id']] = $value['User']['name']; 
			$contactNoArr[$value['User']['contact_no']] = $value['User']['contact_no']; 
		}

		/*debug($usernameArr);
		debug($nameArr);
		debug($contactNoArr);exit;*/


		$roles = $this->User->Role->find('list');
		$roleValue = (isset($this->request->params['named']['User.role_id'])) ? $this->request->params['named']['User.role_id'] : '';

		

		$usernameValue = (isset($this->request->params['named']['User.username'])) ? $this->request->params['named']['User.username'] : '';
		
		$nameValue = (isset($this->request->params['named']['User.id'])) ? $this->request->params['named']['User.id'] : '';
		
		$contactValue = (isset($this->request->params['named']['User.contact_no'])) ? $this->request->params['named']['User.contact_no'] : '';

		$activeValue = (isset($this->request->params['named']['User.active'])) ? $this->request->params['named']['User.active'] : '';

		/*Set Compact*/
		$this->set(compact('roles','roleValue','usernameArr','nameArr','contactNoArr','usernameValue','nameValue','contactValue','activeValue'));

   }

  /*For Staff listing*/
  public function admin_staff(){
  		$options = array();
		$conditions = array();
		$conditions = ['User.role_id'=>2];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = ['CreatedBy','Role','Designation','Department','SubDepartment','StaffType'];
		$this->User->recursive = 0;
		$this->paginate = $options;
		$this->set('users', $this->paginate('User'));
		$this->set('_serialize', array('users'));

		$roles = $this->User->Role->find('list');
		$roleValue = (isset($this->request->params['named']['User.role_id'])) ? $this->request->params['named']['User.role_id'] : '';

		$designations = $this->User->Designation->find('list',['conditions'=>['Designation.active'=>true]]);
		$designationValue = (isset($this->request->params['named']['User.designation_id'])) ? $this->request->params['named']['User.designation_id'] : '';

		$activeValue = (isset($this->request->params['named']['User.active'])) ? $this->request->params['named']['User.active'] : '';

	
		$departments = $this->User->Department->find('list',['conditions'=>['Department.active'=>true]]);
		$departmentValue = (isset($this->request->params['named']['User.department_id'])) ? $this->request->params['named']['User.department_id'] : '';

		$subDepartments = $this->User->SubDepartment->find('list',['conditions'=>['SubDepartment.active'=>true]]);
		$subDepartmentValue = (isset($this->request->params['named']['User.sub_department_id'])) ? $this->request->params['named']['User.sub_department_id'] : '';


		/*Set Compact*/
		$this->set(compact('roles','designations','roleValue','designationValue','activeValue','departments','departmentValue','subDepartments','subDepartmentValue'));

  }

/**
 * admin_lists method
 *
 * @return void
 */
	public function admin_lists() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$users = $this->User->find('list', $options);
		$this->set('users', $users);
		$this->set('_serialize', array('users'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$id = (empty($id)) ? $this->Auth->user('id') : $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		$conditions = array('User.' . $this->User->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('user', $this->User->find('first', $options));
        $this->set('_serialize', array('user'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		$userId = $this->Auth->user('id');

		$roleId = (isset($this->request->params['named']['role_id'])) ? $this->request->params['named']['role_id'] : '';
		$pageTitle = ($roleId == 2) ? 'Staff' : 'Users';	
		$action = ($roleId == 2) ? 'staff' : 'index';



		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];

			// debug($this->request->data);exit;
			if ($this->User->saveAll($this->request->data, ['deep'=>true])) {
				$this->flash = array('message'=>'The user has been saved', 'class'=>'success');
				$this->redirect = ['action'=>$action];
			} else {
				$this->flash = array('message'=>'The user could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$roles = $this->User->Role->find('list');
		$menuLinks = $this->User->MenuLink->find('list');
		$salutations = $this->User->Salutation->find('list');
		
		
		$this->set(compact('roles','menuLinks','salutations','userId','pageTitle','action'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
			if ($this->User->save($this->request->data)) {
				$this->flash = array('message'=>__('The user has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The user could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('User.' . $this->User->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->User->find('first', $options);
		}

		// debug($this->request->data);exit;

		$roles = $this->User->Role->find('list');
		
		$menuLinks = $this->User->MenuLink->find('list');
		$salutations = $this->User->Salutation->find('list');
		
	
		$this->set(compact('roles', 'menuLinks','salutations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null, $confirm = null) {
		parent::delete($id, $confirm);
	}
	
	public function admin_login() {
		$this->layout = 'login';
		$this->set('enableAjax', false);
		
		if($this->Auth->user('id')){
			$this->flash = array('message'=>'You are already logged in.', 'class'=>'danger');
			$this->redirect = ['controller'=>'dashboards','action'=>'index'];
		}

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(!$this->Auth->user('active')) {
                    $this->flash = array('message'=>'Your activation is pending', 'class'=>'info');
                    return $this->redirect = $this->Auth->logout();
                }
                
				$this->User->resetRoles();
				
				// updating last_login field.
				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('last_login', date('Y-m-d H:i:s') );
				
				$this->flash = array('message'=>'You have successfully logged in', 'class'=>'success');
				$this->redirect = $this->Auth->redirect();
			} else {
				$this->flash = array('message'=>'Invalid username or password', 'class'=>'danger');
			}
		}
	}
	
	public function admin_logout() {
		$this->flash = array('message'=>'You have succesfully logged out', 'class'=>'success');
	    $this->redirect($this->Auth->logout());
	}


	/*Admin Email Setup*/
	public function admin_email_setup(){
		$this->autoRender = false;
		$responce = [];
		$statusMsg = $emailName = "";
		/*Name*/
		$firstName = lcfirst($this->request->data['firstName']); 
		$lastName = lcfirst($this->request->data['lastName']); 

		$name = $firstName.' '.$lastName;

		/*domain Id*/
		$domainId = (!empty($this->request->data['domainID'])) ? $this->request->data['domainID'] : ''; 

		$userId = (isset($this->request->data['userId'])) ? $this->request->data['userId'] : ''; 


		/*Domain Listing*/
		if(!empty($domainId)){
			$domain = $this->User->Domin->find('first',['conditions'=>['Domin.id'=>$domainId],'contain'=>false]);
			/*Domain Name*/
			$domainName = (!empty($domain)) ? $domain['Domin']['name'] : ''; 

			
			/*User Details*/
			if(!empty($userId)){
				$userDetail = $this->User->find('first',['conditions'=>['User.id'=>$userId],'contain'=>false]);
				$emailName = (!empty($userDetail)) ? $firstName.'.'.$lastName.$domainName : $firstName.'.'.$lastName.$domainName; 

			}else{
				if(!empty($name)){
					$userDetail = $this->User->find('first',['conditions'=>['User.name'=>$name],'contain'=>false]);
					$emailName = (empty($userDetail)) ? $firstName.'.'.$lastName.$domainName : $firstName.'.'.mb_substr($lastName, 0, 1).$domainName; 
				}else{
					$emailName = "Please Entet Name !";
				}
			}
			

		}

		$responce = ['emailName'=>$emailName];

		return json_encode($responce);

	}


	/**
 * users method
 *
 * @return array
 */
	public function admin_forgot_password() {
		$this->layout = 'login';
		$this->set('enableAjax', false);
		if($this->Auth->user('id')){
			$this->flash = array('message'=>'You are already logged in.', 'class'=>'danger');
			$this->redirect = true;
		}
		if ($this->request->is('post')) {

			$user=$this->User->find('first', array('fields' => array('User.id', 'User.password'),'conditions'=>['User.username'=>$this->request->data['User']['username'],'User.active'=>true]));

			if(!empty($user)) {
				$pwd=$this->User->generateRandString(8);
				$this->request->data['User']['password']=$pwd;
				$this->request->data['User']['id'] = $user['User']['id'];
				if ($this->User->saveAll($this->request->data)) {
					$this->request->data['pwd']=$pwd;
					$Email = new CakeEmail('default');
					$Email->template('forgot_password')
			            ->viewVars(['data' => $this->request->data])
			            ->emailFormat('html')
			            ->to($this->request->data['User']['username'])
			            // ->to('shehzad@puratech.in')
			            // ->bcc(['kunal@puratech.co.in', 'wasim@puratech.co.in'])
			            ->subject('Password reset Confirmation for Mind Body Health');
					 try{$Email->send();}catch(Exception $e){}
					$this->flash = array('message'=>__('Password has been mailed to you. Please login with new password'), 'class'=>'success');
					$this->redirect = true;
				} else {
					$this->flash = array('message'=>__('Some Error Occurred.'), 'class'=>'danger');
				}
			}
			else {
				$this->flash = array('message'=>'Admin with this Email ID does not Exist in our System.', 'class'=>'danger');
			}
		}

	}
}
