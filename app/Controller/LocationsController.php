<?php
App::uses('AppController', 'Controller');
/**
 * Locations Controller
 *
 * @property Location $Location
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class LocationsController extends AppController {

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
		
		$this->Location->recursive = 0;
		$this->paginate = $options;
		$this->set('locations', $this->paginate('Location'));
		$this->set('_serialize', array('locations'));
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
		
		$locations = $this->Location->find('list', $options);
		$this->set('locations', $locations);
		$this->set('_serialize', array('locations'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		$conditions = array('Location.' . $this->Location->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('location', $this->Location->find('first', $options));
        $this->set('_serialize', array('location'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {

		if ($this->request->is('post')) {

			if ($this->Location->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The location has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The location could not be saved. Please, try again.', 'class'=>'danger');
			}
		}



		$amenities = $this->Location->Amenity->find('list',['conditions'=>['Amenity.active'=>true]]);

		$this->set(compact('amenities'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Location->saveAll($this->request->data)) {
				$this->flash = array('message'=>__('The location has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The location could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Location.' . $this->Location->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Location->find('first', $options);
		}
		$amenities = $this->Location->Amenity->find('list',['conditions'=>['Amenity.active'=>true]]);

		$this->set(compact('amenities'));
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
