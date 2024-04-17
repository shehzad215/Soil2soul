<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MenusController extends AppController {

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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = false;
		$this->Menu->recursive = 0;
		$this->paginate = $options;
		$this->set('menus', $this->paginate('Menu'));
		$this->set('_serialize', array('menus'));
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
		
		$menus = $this->Menu->find('list', $options);
		$this->set('menus', $menus);
		$this->set('_serialize', array('menus'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$conditions = array('Menu.' . $this->Menu->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('menu', $this->Menu->find('first', $options));
        $this->set('_serialize', array('menu'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->flash = array('message'=>'The menu has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The menu could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Menu->save($this->request->data)) {
				$this->flash = array('message'=>__('The menu has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The menu could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Menu.' . $this->Menu->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Menu->find('first', $options);
		}
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
