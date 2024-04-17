<?php
App::uses('AppController', 'Controller');
/**
 * Salutations Controller
 *
 * @property Salutation $Salutation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SalutationsController extends AppController {

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
		$this->Salutation->recursive = 0;
		$this->paginate = $options;
		$this->set('salutations', $this->paginate('Salutation'));
		$this->set('_serialize', array('salutations'));
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
		
		$salutations = $this->Salutation->find('list', $options);
		$this->set('salutations', $salutations);
		$this->set('_serialize', array('salutations'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Salutation->exists($id)) {
			throw new NotFoundException(__('Invalid salutation'));
		}
		$conditions = array('Salutation.' . $this->Salutation->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('salutation', $this->Salutation->find('first', $options));
        $this->set('_serialize', array('salutation'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Salutation->create();
			if ($this->Salutation->save($this->request->data)) {
				$this->flash = array('message'=>'The salutation has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The salutation could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->Salutation->exists($id)) {
			throw new NotFoundException(__('Invalid salutation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Salutation->save($this->request->data)) {
				$this->flash = array('message'=>__('The salutation has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The salutation could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Salutation.' . $this->Salutation->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Salutation->find('first', $options);
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
