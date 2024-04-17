<?php
App::uses('AppController', 'Controller');
/**
 * OurTeamTypes Controller
 *
 * @property OurTeamType $OurTeamType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurTeamTypesController extends AppController {

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
		
		$this->OurTeamType->recursive = 0;
		$this->paginate = $options;
		$this->set('ourTeamTypes', $this->paginate('OurTeamType'));
		$this->set('_serialize', array('ourTeamTypes'));
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
		
		$ourTeamTypes = $this->OurTeamType->find('list', $options);
		$this->set('ourTeamTypes', $ourTeamTypes);
		$this->set('_serialize', array('ourTeamTypes'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurTeamType->exists($id)) {
			throw new NotFoundException(__('Invalid our team type'));
		}
		$conditions = array('OurTeamType.' . $this->OurTeamType->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourTeamType', $this->OurTeamType->find('first', $options));
        $this->set('_serialize', array('ourTeamType'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OurTeamType->create();
			if ($this->OurTeamType->save($this->request->data)) {
				$this->flash = array('message'=>'The our team type has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our team type could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->OurTeamType->exists($id)) {
			throw new NotFoundException(__('Invalid our team type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurTeamType->save($this->request->data)) {
				$this->flash = array('message'=>__('The our team type has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our team type could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurTeamType.' . $this->OurTeamType->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurTeamType->find('first', $options);
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
