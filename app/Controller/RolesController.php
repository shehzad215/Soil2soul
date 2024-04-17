<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RolesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

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
		$options['contain'] = false;
		$this->Role->recursive = 0;
		$this->paginate = $options;
		$this->set('roles', $this->paginate('Role'));
		$this->set('_serialize', array('roles'));
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
		
		$roles = $this->Role->find('list', $options);
		$this->set('roles', $roles);
		$this->set('_serialize', array('roles'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		$conditions = array('Role.' . $this->Role->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('role', $this->Role->find('first', $options));
        $this->set('_serialize', array('role'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->flash = array('message'=>'The role has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The role could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$menuLinks = $this->Role->MenuLink->find('list');
		$this->set(compact('menuLinks'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->flash = array('message'=>__('The role has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The role could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Role.' . $this->Role->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Role->find('first', $options);
		}
		$menuLinks = $this->Role->MenuLink->find('list');
		$this->set(compact('menuLinks'));
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
