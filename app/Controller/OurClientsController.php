<?php
App::uses('AppController', 'Controller');
/**
 * OurClients Controller
 *
 * @property OurClient $OurClient
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurClientsController extends AppController {

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
		
		$this->OurClient->recursive = 0;
		$this->paginate = $options;
		$this->set('ourClients', $this->paginate('OurClient'));
		$this->set('_serialize', array('ourClients'));
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
		
		$ourClients = $this->OurClient->find('list', $options);
		$this->set('ourClients', $ourClients);
		$this->set('_serialize', array('ourClients'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurClient->exists($id)) {
			throw new NotFoundException(__('Invalid our client'));
		}
		$conditions = array('OurClient.' . $this->OurClient->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourClient', $this->OurClient->find('first', $options));
        $this->set('_serialize', array('ourClient'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OurClient->create();
			if ($this->OurClient->save($this->request->data)) {
				$this->flash = array('message'=>'The our client has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our client could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->OurClient->exists($id)) {
			throw new NotFoundException(__('Invalid our client'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurClient->save($this->request->data)) {
				$this->flash = array('message'=>__('The our client has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our client could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurClient.' . $this->OurClient->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurClient->find('first', $options);
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
