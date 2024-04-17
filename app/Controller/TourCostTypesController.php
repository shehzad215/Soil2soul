<?php
App::uses('AppController', 'Controller');
/**
 * TourCostTypes Controller
 *
 * @property TourCostType $TourCostType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TourCostTypesController extends AppController {

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
		$this->TourCostType->recursive = 0;
		$this->paginate = $options;
		$this->set('tourCostTypes', $this->paginate('TourCostType'));
		$this->set('_serialize', array('tourCostTypes'));
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
		
		$tourCostTypes = $this->TourCostType->find('list', $options);
		$this->set('tourCostTypes', $tourCostTypes);
		$this->set('_serialize', array('tourCostTypes'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TourCostType->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost type'));
		}
		$conditions = array('TourCostType.' . $this->TourCostType->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('tourCostType', $this->TourCostType->find('first', $options));
        $this->set('_serialize', array('tourCostType'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TourCostType->create();
			if ($this->TourCostType->save($this->request->data)) {
				$this->flash = array('message'=>'The tour cost type has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The tour cost type could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->TourCostType->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TourCostType->save($this->request->data)) {
				$this->flash = array('message'=>__('The tour cost type has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The tour cost type could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('TourCostType.' . $this->TourCostType->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourCostType->find('first', $options);
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
