<?php
App::uses('AppController', 'Controller');
/**
 * TourCosts Controller
 *
 * @property TourCost $TourCost
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TourCostsController extends AppController {

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
		$options['contain'] = ['OurJourny'];
		$this->TourCost->recursive = 0;
		$this->paginate = $options;
		$this->set('tourCosts', $this->paginate('TourCost'));
		$this->set('_serialize', array('tourCosts'));
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
		
		$tourCosts = $this->TourCost->find('list', $options);
		$this->set('tourCosts', $tourCosts);
		$this->set('_serialize', array('tourCosts'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TourCost->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost'));
		}
		$conditions = array('TourCost.' . $this->TourCost->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('tourCost', $this->TourCost->find('first', $options));
        $this->set('_serialize', array('tourCost'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {
		$this->set('enableAjax',false);
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['OurJourny']['id'] = $journeyId;
			if ($this->TourCost->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The tour cost has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The tour cost could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else {
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourCost->OurJourny->find('first', $options);
		}

		$ourJournies = $this->TourCost->OurJourny->find('list');

		$this->set(compact('ourJournies','journeyId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		// $this->set('enableAjax',false);
		if (!$this->TourCost->exists($id)) {
			throw new NotFoundException(__('Invalid tour cost'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TourCost->save($this->request->data)) {
				$this->flash = array('message'=>__('The tour cost has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The tour cost could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('TourCost.' . $this->TourCost->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourCost->find('first', $options);
		}
		$ourJournies = $this->TourCost->OurJourny->find('list');
		$this->set(compact('ourJournies'));
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

	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$tourcostid = trim($this->request->data['tourcostid']);

	// debug($serviceId);exit;

	 if (!empty($tourcostid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->TourCost->id = $tourcostid;
       	 if ($this->TourCost->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}
}
