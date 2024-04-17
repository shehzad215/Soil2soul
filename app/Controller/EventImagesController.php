<?php
App::uses('AppController', 'Controller');
/**
 * EventImages Controller
 *
 * @property EventImage $EventImage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EventImagesController extends AppController {

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
		$options['contain'] = ['Event'];
		$this->EventImage->recursive = 0;
		$this->paginate = $options;
		$this->set('eventImages', $this->paginate('EventImage'));
		$this->set('_serialize', array('eventImages'));
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
		
		$eventImages = $this->EventImage->find('list', $options);
		$this->set('eventImages', $eventImages);
		$this->set('_serialize', array('eventImages'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EventImage->exists($id)) {
			throw new NotFoundException(__('Invalid event image'));
		}
		$conditions = array('EventImage.' . $this->EventImage->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('eventImage', $this->EventImage->find('first', $options));
        $this->set('_serialize', array('eventImage'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EventImage->create();
			if ($this->EventImage->save($this->request->data)) {
				$this->flash = array('message'=>'The event image has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The event image could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$events = $this->EventImage->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EventImage->exists($id)) {
			throw new NotFoundException(__('Invalid event image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventImage->save($this->request->data)) {
				$this->flash = array('message'=>__('The event image has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The event image could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('EventImage.' . $this->EventImage->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->EventImage->find('first', $options);
		}
		$events = $this->EventImage->Event->find('list');
		$this->set(compact('events'));
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
