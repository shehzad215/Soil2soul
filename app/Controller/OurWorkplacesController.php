<?php
App::uses('AppController', 'Controller');
/**
 * OurWorkplaces Controller
 *
 * @property OurWorkplace $OurWorkplace
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurWorkplacesController extends AppController {

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
		
		$this->OurWorkplace->recursive = 0;
		$this->paginate = $options;
		$this->set('ourWorkplaces', $this->paginate('OurWorkplace'));
		$this->set('_serialize', array('ourWorkplaces'));
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
		
		$ourWorkplaces = $this->OurWorkplace->find('list', $options);
		$this->set('ourWorkplaces', $ourWorkplaces);
		$this->set('_serialize', array('ourWorkplaces'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurWorkplace->exists($id)) {
			throw new NotFoundException(__('Invalid our workplace'));
		}
		$conditions = array('OurWorkplace.' . $this->OurWorkplace->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourWorkplace', $this->OurWorkplace->find('first', $options));
        $this->set('_serialize', array('ourWorkplace'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OurWorkplace->create();
			if ($this->OurWorkplace->save($this->request->data)) {
				$this->flash = array('message'=>'The our workplace has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our workplace could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->OurWorkplace->exists($id)) {
			throw new NotFoundException(__('Invalid our workplace'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurWorkplace->save($this->request->data)) {
				$this->flash = array('message'=>__('The our workplace has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our workplace could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurWorkplace.' . $this->OurWorkplace->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurWorkplace->find('first', $options);
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
