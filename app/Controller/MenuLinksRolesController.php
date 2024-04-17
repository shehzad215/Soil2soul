<?php
App::uses('AppController', 'Controller');
/**
 * MenuLinksRoles Controller
 *
 * @property MenuLinksRole $MenuLinksRole
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MenuLinksRolesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

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
		
		$this->MenuLinksRole->recursive = 0;
		$this->paginate = $options;
		$this->set('menuLinksRoles', $this->paginate('MenuLinksRole'));
		$this->set('_serialize', array('menuLinksRoles'));
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
		
		$menuLinksRoles = $this->MenuLinksRole->find('list', $options);
		$this->set('menuLinksRoles', $menuLinksRoles);
		$this->set('_serialize', array('menuLinksRoles'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MenuLinksRole->exists($id)) {
			throw new NotFoundException(__('Invalid menu links role'));
		}
		$conditions = array('MenuLinksRole.' . $this->MenuLinksRole->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('menuLinksRole', $this->MenuLinksRole->find('first', $options));
        $this->set('_serialize', array('menuLinksRole'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MenuLinksRole->create();
			if ($this->MenuLinksRole->save($this->request->data)) {
				$this->flash = array('message'=>'The menu links role has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The menu links role could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$menuLinks = $this->MenuLinksRole->MenuLink->find('list');
		$roles = $this->MenuLinksRole->Role->find('list');
		$this->set(compact('menuLinks', 'roles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MenuLinksRole->exists($id)) {
			throw new NotFoundException(__('Invalid menu links role'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MenuLinksRole->save($this->request->data)) {
				$this->flash = array('message'=>__('The menu links role has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The menu links role could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('MenuLinksRole.' . $this->MenuLinksRole->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->MenuLinksRole->find('first', $options);
		}
		$menuLinks = $this->MenuLinksRole->MenuLink->find('list');
		$roles = $this->MenuLinksRole->Role->find('list');
		$this->set(compact('menuLinks', 'roles'));
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
