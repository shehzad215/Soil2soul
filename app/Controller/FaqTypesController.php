<?php
App::uses('AppController', 'Controller');
/**
 * FaqTypes Controller
 *
 * @property FaqType $FaqType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FaqTypesController extends AppController {

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
		
		$this->FaqType->recursive = 0;
		$this->paginate = $options;
		$this->set('faqTypes', $this->paginate('FaqType'));
		$this->set('_serialize', array('faqTypes'));
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
		
		$faqTypes = $this->FaqType->find('list', $options);
		$this->set('faqTypes', $faqTypes);
		$this->set('_serialize', array('faqTypes'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FaqType->exists($id)) {
			throw new NotFoundException(__('Invalid faq type'));
		}
		$conditions = array('FaqType.' . $this->FaqType->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('faqType', $this->FaqType->find('first', $options));
        $this->set('_serialize', array('faqType'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FaqType->create();
			if ($this->FaqType->save($this->request->data)) {
				$this->flash = array('message'=>'The faq type has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The faq type could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->FaqType->exists($id)) {
			throw new NotFoundException(__('Invalid faq type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FaqType->save($this->request->data)) {
				$this->flash = array('message'=>__('The faq type has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The faq type could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('FaqType.' . $this->FaqType->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->FaqType->find('first', $options);
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
