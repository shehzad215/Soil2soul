<?php
App::uses('AppController', 'Controller');
/**
 * LocationImages Controller
 *
 * @property LocationImage $LocationImage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class LocationImagesController extends AppController {

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
		$options['contain'] = ['Location'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->LocationImage->recursive = 0;
		$this->paginate = $options;
		$this->set('locationImages', $this->paginate('LocationImage'));
		$this->set('_serialize', array('locationImages'));
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
		
		$locationImages = $this->LocationImage->find('list', $options);
		$this->set('locationImages', $locationImages);
		$this->set('_serialize', array('locationImages'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__('Invalid location image'));
		}
		$conditions = array('LocationImage.' . $this->LocationImage->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('locationImage', $this->LocationImage->find('first', $options));
        $this->set('_serialize', array('locationImage'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);

		$locationId = (isset($this->request->params['named']['location_id'])) ? $this->request->params['named']['location_id'] : '';

		if ($this->request->is('post')) {
			$this->LocationImage->create();
			if ($this->LocationImage->save($this->request->data)) {
				$this->flash = array('message'=>'The location image has been saved', 'class'=>'success');
				$this->redirect = (empty($locationId)) ? ['action'=>'index'] : ['action' => 'index','location_id'=>$locationId];
			} else {
				$this->flash = array('message'=>'The location image could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$locations = $this->LocationImage->Location->find('list');
		$this->set(compact('locations','locationId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('enableAjax',false);

		$locationId = (isset($this->request->params['named']['location_id'])) ? $this->request->params['named']['location_id'] : '';

		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__('Invalid location image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LocationImage->save($this->request->data)) {
				$this->flash = array('message'=>__('The location image has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The location image could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('LocationImage.' . $this->LocationImage->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->LocationImage->find('first', $options);
		}
		$locations = $this->LocationImage->Location->find('list');
		$this->set(compact('locations','locationId'));
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
