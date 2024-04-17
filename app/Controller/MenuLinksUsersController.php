<?php
App::uses('AppController', 'Controller');
/**
 * MenuLinksUsers Controller
 *
 * @property MenuLinksUser $MenuLinksUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MenuLinksUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/*
* beforeFilter method
*/
 	function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', false);
//		$this->Auth->allow('');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->MenuLinksUser->recursive = 0;
		$this->paginate = $options;
		$this->set('menuLinksUsers', $this->paginate('MenuLinksUser'));
		$this->set('_serialize', array('menuLinksUsers'));
	}

/**
 * lists method
 *
 * @return void
 */
	public function lists() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$menuLinksUsers = $this->MenuLinksUser->find('list', $options);
		$this->set('menuLinksUsers', $menuLinksUsers);
		$this->set('_serialize', array('menuLinksUsers'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MenuLinksUser->exists($id)) {
			throw new NotFoundException(__('Invalid menu links user'));
		}
		$conditions = array('MenuLinksUser.' . $this->MenuLinksUser->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('menuLinksUser', $this->MenuLinksUser->find('first', $options));
        $this->set('_serialize', array('menuLinksUser'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MenuLinksUser->create();
			if ($this->MenuLinksUser->save($this->request->data)) {
				$this->flash = array('message'=>'The menu links user has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The menu links user could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$menuLinks = $this->MenuLinksUser->MenuLink->find('list');
		$users = $this->MenuLinksUser->User->find('list');
		$this->set(compact('menuLinks', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MenuLinksUser->exists($id)) {
			throw new NotFoundException(__('Invalid menu links user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MenuLinksUser->save($this->request->data)) {
				$this->flash = array('message'=>__('The menu links user has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The menu links user could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('MenuLinksUser.' . $this->MenuLinksUser->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->MenuLinksUser->find('first', $options);
		}
		$menuLinks = $this->MenuLinksUser->MenuLink->find('list');
		$users = $this->MenuLinksUser->User->find('list');
		$this->set(compact('menuLinks', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $confirm = null) {
		parent::delete($id, $confirm);
	}
	

/*
* beforeFilter method
*/

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->MenuLinksUser->recursive = 0;
		$this->paginate = $options;
		$this->set('menuLinksUsers', $this->paginate('MenuLinksUser'));
		$this->set('_serialize', array('menuLinksUsers'));
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
		
		$menuLinksUsers = $this->MenuLinksUser->find('list', $options);
		$this->set('menuLinksUsers', $menuLinksUsers);
		$this->set('_serialize', array('menuLinksUsers'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MenuLinksUser->exists($id)) {
			throw new NotFoundException(__('Invalid menu links user'));
		}
		$conditions = array('MenuLinksUser.' . $this->MenuLinksUser->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('menuLinksUser', $this->MenuLinksUser->find('first', $options));
        $this->set('_serialize', array('menuLinksUser'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MenuLinksUser->create();
			if ($this->MenuLinksUser->save($this->request->data)) {
				$this->flash = array('message'=>'The menu links user has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The menu links user could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$menuLinks = $this->MenuLinksUser->MenuLink->find('list');
		$users = $this->MenuLinksUser->User->find('list');
		$this->set(compact('menuLinks', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MenuLinksUser->exists($id)) {
			throw new NotFoundException(__('Invalid menu links user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MenuLinksUser->save($this->request->data)) {
				$this->flash = array('message'=>__('The menu links user has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The menu links user could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('MenuLinksUser.' . $this->MenuLinksUser->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->MenuLinksUser->find('first', $options);
		}
		$menuLinks = $this->MenuLinksUser->MenuLink->find('list');
		$users = $this->MenuLinksUser->User->find('list');
		$this->set(compact('menuLinks', 'users'));
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
	}}
