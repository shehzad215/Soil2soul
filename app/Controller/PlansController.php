<?php
App::uses('AppController', 'Controller');
/**
 * Plans Controller
 *
 * @property Plan $Plan
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PlansController extends AppController {

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
		$options['contain']=false;
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->Plan->recursive = 0;
		$this->paginate = $options;
		$this->set('plans', $this->paginate('Plan'));
		$this->set('_serialize', array('plans'));
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
		
		$plans = $this->Plan->find('list', $options);
		$this->set('plans', $plans);
		$this->set('_serialize', array('plans'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Plan->exists($id)) {
			throw new NotFoundException(__('Invalid plan'));
		}
		$conditions = array('Plan.' . $this->Plan->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('plan', $this->Plan->find('first', $options));
        $this->set('_serialize', array('plan'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Plan->create();
			if ($this->Plan->save($this->request->data)) {
				$this->flash = array('message'=>'The plan has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The plan could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->Plan->exists($id)) {
			throw new NotFoundException(__('Invalid plan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Plan->save($this->request->data)) {
				$this->flash = array('message'=>__('The plan has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The plan could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Plan.' . $this->Plan->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Plan->find('first', $options);
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
