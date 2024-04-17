<?php
App::uses('AppController', 'Controller');
/**
 * TourCostDetails Controller
 *
 * @property TourCostDetail $TourCostDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TourCostDetailsController extends AppController {

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
	$this->Auth->allow('get_selected_price');
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
		
		$this->TourCostDetail->recursive = 0;
		$this->paginate = $options;
		$this->set('tourCostDetails', $this->paginate('TourCostDetail'));
		$this->set('_serialize', array('tourCostDetails'));
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
		
		$tourCostDetails = $this->TourCostDetail->find('list', $options);
		$this->set('tourCostDetails', $tourCostDetails);
		$this->set('_serialize', array('tourCostDetails'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TourCostDetail->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost detail'));
		}
		$conditions = array('TourCostDetail.' . $this->TourCostDetail->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('tourCostDetail', $this->TourCostDetail->find('first', $options));
        $this->set('_serialize', array('tourCostDetail'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId,$costTypeId) {
		
		if ($this->request->is(array('post', 'put'))) {
				
			$this->request->data['TourCost']['id']	= $costTypeId;
			// debug($this->request->data);exit;

			if ($this->TourCostDetail->TourCost->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The tour cost detail has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The tour cost detail could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else {
			$conditions = array('TourCost.id' => $costTypeId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourCostDetail->TourCost->find('first', $options);
		}

		$ourJourney = $this->TourCostDetail->OurJourny->find('list',['conditions'=>['OurJourny.id'=>$journeyId]]);
		$tourCost = $this->TourCostDetail->TourCost->find('list',['conditions'=>['TourCost.id'=>$costTypeId],'fields'=>['date']]);

		// debug($tourCost);exit;
		$tourCostTypes = $this->TourCostDetail->TourCostType->find('list',['conditions'=>['TourCostType.active'=>true]]);
		$currencies = $this->TourCostDetail->Currency->find('list',['conditions'=>['Currency.active'=>true]]);

		// debug($currencies);exit;
		
		$this->set(compact('tourCostTypes','journeyId','costTypeId','ourJourney','tourCost','currencies'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TourCostDetail->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost detail'));
		}
		
		$costDetails = $this->TourCostDetail->find('first',['conditions'=>['TourCostDetail.id'=>$id],'contain'=>false]);	

		if ($this->request->is(array('post', 'put'))) {
			if ($this->TourCostDetail->save($this->request->data)) {
				$this->flash = array('message'=>__('The tour cost detail has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The tour cost detail could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('TourCostDetail.' . $this->TourCostDetail->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourCostDetail->find('first', $options);
		}
		
		$ourJournies = $this->TourCostDetail->OurJourny->find('list',['conditions'=>['OurJourny.id'=>$costDetails['TourCostDetail']['our_journy_id']]]);

		$tourCosts = $this->TourCostDetail->TourCost->find('list',['conditions'=>['TourCost.id'=>$costDetails['TourCostDetail']['tour_cost_id']],'fields'=>['date']]);

		// debug($tourCosts);exit;

		$tourCostTypes = $this->TourCostDetail->TourCostType->find('list',['conditions'=>['TourCostType.active'=>true]]);
		
		$this->set(compact('ourJournies', 'tourCosts', 'tourCostTypes','costDetails'));
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

public function get_selected_price(){
	$this->autoRender = false;
	// debug($this->request->data);exit;

	$tourCostId = $this->request->data['tourCostId'];
	$currencyId = $this->Session->read('Currency.id');

	$tourCostDetail = $this->TourCostDetail->find('first',['conditions'=>['TourCostDetail.tour_cost_id'=>$tourCostId,'TourCostDetail.tour_cost_type_id'=>1,'TourCostDetail.currency_id'=>$currencyId],'contain'=>['Currency.iso_code']]);

	// debug($tourCostDetail);exit;

	$selectedPrice = (!empty($tourCostDetail['TourCostDetail']['price'])) ? $tourCostDetail['Currency']
	['iso_code'].' '.$tourCostDetail['TourCostDetail']['price'] : 'TBA';

	return json_encode($selectedPrice);	

}


}
