<?php
App::uses('AppController', 'Controller');
/**
 * CoworkingSolutions Controller
 *
 * @property CoworkingSolution $CoworkingSolution
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CoworkingSolutionsController extends AppController {

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
		$this->CoworkingSolution->recursive = 0;
		$this->paginate = $options;
		$this->set('coworkingSolutions', $this->paginate('CoworkingSolution'));
		$this->set('_serialize', array('coworkingSolutions'));
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
		
		$coworkingSolutions = $this->CoworkingSolution->find('list', $options);
		$this->set('coworkingSolutions', $coworkingSolutions);
		$this->set('_serialize', array('coworkingSolutions'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CoworkingSolution->exists($id)) {
			throw new NotFoundException(__('Invalid coworking solution'));
		}
		$conditions = array('CoworkingSolution.' . $this->CoworkingSolution->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('coworkingSolution', $this->CoworkingSolution->find('first', $options));
        $this->set('_serialize', array('coworkingSolution'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CoworkingSolution->create();
			if ($this->CoworkingSolution->save($this->request->data)) {
				$this->flash = array('message'=>'The coworking solution has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The coworking solution could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->CoworkingSolution->exists($id)) {
			throw new NotFoundException(__('Invalid coworking solution'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoworkingSolution->save($this->request->data)) {
				$this->flash = array('message'=>__('The coworking solution has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The coworking solution could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('CoworkingSolution.' . $this->CoworkingSolution->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->CoworkingSolution->find('first', $options);
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
