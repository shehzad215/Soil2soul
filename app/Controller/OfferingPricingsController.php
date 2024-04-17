<?php
App::uses('AppController', 'Controller');
/**
 * OfferingPricings Controller
 *
 * @property OfferingPricing $OfferingPricing
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OfferingPricingsController extends AppController {

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

		$locationId = (isset($this->request->params['named']['location_id'])) ? $this->request->params['named']['location_id'] : ''; 

		$options = array();
		$options['contain']=['Location'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->OfferingPricing->recursive = 0;
		$this->paginate = $options;
		$this->set('offeringPricings', $this->paginate('OfferingPricing'));
		$this->set('_serialize', array('offeringPricings'));

		$this->set(compact('locationId'));
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
		
		$offeringPricings = $this->OfferingPricing->find('list', $options);
		$this->set('offeringPricings', $offeringPricings);
		$this->set('_serialize', array('offeringPricings'));

	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OfferingPricing->exists($id)) {
			throw new NotFoundException(__('Invalid offering pricing'));
		}
		$conditions = array('OfferingPricing.' . $this->OfferingPricing->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('offeringPricing', $this->OfferingPricing->find('first', $options));
        $this->set('_serialize', array('offeringPricing'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$locationId = (isset($this->request->params['named']['location_id'])) ? $this->request->params['named']['location_id'] : ''; 
		if ($this->request->is('post')) {
			$this->OfferingPricing->create();
			if ($this->OfferingPricing->save($this->request->data)) {
				$this->flash = array('message'=>'The offering pricing has been saved', 'class'=>'success');
				$this->redirect = (!empty($locationId)) ? 
				['action'=>'index','location_id'=>$locationId] : ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The offering pricing could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$locations = $this->OfferingPricing->Location->find('list');
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
		$locationId = (isset($this->request->params['named']['location_id'])) ? $this->request->params['named']['location_id'] : ''; 
		if (!$this->OfferingPricing->exists($id)) {
			throw new NotFoundException(__('Invalid offering pricing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OfferingPricing->save($this->request->data)) {
				$this->flash = array('message'=>__('The offering pricing has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The offering pricing could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OfferingPricing.' . $this->OfferingPricing->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OfferingPricing->find('first', $options);
		}
		$locations = $this->OfferingPricing->Location->find('list');
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
