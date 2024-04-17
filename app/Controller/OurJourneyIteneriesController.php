<?php
App::uses('AppController', 'Controller');
/**
 * OurJourneyIteneries Controller
 *
 * @property OurJourneyItenery $OurJourneyItenery
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurJourneyIteneriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/*
* beforeFilter method
*/
	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$iternaryid = trim($this->request->data['iternaryid']);

	// debug($serviceId);exit;

	 if (!empty($iternaryid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurJourneyItenery->id = $iternaryid;
       	 if ($this->OurJourneyItenery->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$options['contain']=['OurJourny'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->OurJourneyItenery->recursive = 0;
		$this->paginate = $options;
		$this->set('ourJourneyIteneries', $this->paginate('OurJourneyItenery'));
		$this->set('_serialize', array('ourJourneyIteneries'));
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
		
		$ourJourneyIteneries = $this->OurJourneyItenery->find('list', $options);
		$this->set('ourJourneyIteneries', $ourJourneyIteneries);
		$this->set('_serialize', array('ourJourneyIteneries'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurJourneyItenery->exists($id)) {
			throw new NotFoundException(__('Invalid our journey itenery'));
		}
		$conditions = array('OurJourneyItenery.' . $this->OurJourneyItenery->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourJourneyItenery', $this->OurJourneyItenery->find('first', $options));
        $this->set('_serialize', array('ourJourneyItenery'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {
		$this->loadModel('OurJourny');
		$countnights = $this->OurJourny->find('first',['conditions'=>['OurJourny.id'=>$journeyId],'contain'=>false,'fields'=>'no_of_nights']);

		$countnights = $countnights['OurJourny']['no_of_nights'];

		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['OurJourny']['id'] = $journeyId;
			//debug($this->request->data);die;
			if ($this->OurJourneyItenery->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The our journey itenery has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our journey itenery could not be saved. Please, try again.', 'class'=>'danger');
			}
		} else{
			$conditions = array('OurJourny.id' => $journeyId);
			/*debug($conditions);die;*/
			$options['conditions'] = $conditions;
			$options['contain'] = ['OurJourneyItenery'];
			
			$this->request->data = $this->OurJourneyItenery->OurJourny->find('first', $options);
		}

		// debug($this->request->data);exit;

		$ourJournies = $this->OurJourneyItenery->OurJourny->find('list');
		$this->set(compact('ourJournies','journeyId','countnights'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OurJourneyItenery->exists($id)) {
			throw new NotFoundException(__('Invalid our journey itenery'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurJourneyItenery->save($this->request->data)) {
				$this->flash = array('message'=>__('The our journey itenery has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our journey itenery could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurJourneyItenery.' . $this->OurJourneyItenery->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyItenery->find('first', $options);
		}
		$ourJournies = $this->OurJourneyItenery->OurJourny->find('list');
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
	}}
