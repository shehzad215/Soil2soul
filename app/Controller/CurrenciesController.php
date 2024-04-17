<?php
App::uses('AppController', 'Controller');
/**
 * Currencies Controller
 *
 * @property Currency $Currency
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CurrenciesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/*
* beforeFilter method
*/
function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', false);
		$this->Auth->allow('update_currency_session');
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] =  false;
		$this->Currency->recursive = 0;
		$this->paginate = $options;
		$this->set('currencies', $this->paginate('Currency'));
		$this->set('_serialize', array('currencies'));
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
		
		$currencies = $this->Currency->find('list', $options);
		$this->set('currencies', $currencies);
		$this->set('_serialize', array('currencies'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Currency->exists($id)) {
			throw new NotFoundException(__('Invalid currency'));
		}
		$conditions = array('Currency.' . $this->Currency->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('currency', $this->Currency->find('first', $options));
        $this->set('_serialize', array('currency'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Currency->create();
			if ($this->Currency->save($this->request->data)) {
				$this->flash = array('message'=>'The currency has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The currency could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->Currency->exists($id)) {
			throw new NotFoundException(__('Invalid currency'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Currency->save($this->request->data)) {
				$this->flash = array('message'=>__('The currency has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The currency could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Currency.' . $this->Currency->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Currency->find('first', $options);
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
	}

	public function update_currency_session(){
			
		// $currencyId	
		// debug($this->request->data);exit;	
		
		$currencyId = (isset($this->request->data['defaultCurrencyId'])) ? $this->request->data['defaultCurrencyId'] : 67;
		$currencies = $this->Currency->find('first',[
				'fields' => ['id', 'name', 'iso_code', 'sign', 'conversion_rate', 'blank', 'format', 'decimals'],
				'conditions' =>['Currency.id' => $currencyId],
				'contain'=>false
			]
		);
		$this->Session->write('Currency', $currencies['Currency']);

		$response = ['status'=>'success', 'currency' => $currencies['Currency']];
		$this->set(compact('response'));
		$this->set('_serialize', array('response'));
	}




}
