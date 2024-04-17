<?php
App::uses('AppController', 'Controller');
/**
 * OurJourneyInclusions Controller
 *
 * @property OurJourneyInclusion $OurJourneyInclusion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurJourneyInclusionsController extends AppController {

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

	$inclusionid = trim($this->request->data['inclusionid']);

	// debug($serviceId);exit;

	 if (!empty($inclusionid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurJourneyInclusion->id = $inclusionid;
       	 if ($this->OurJourneyInclusion->saveField('active',$value)) {
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
		
		$this->OurJourneyInclusion->recursive = 0;
		$this->paginate = $options;
		$this->set('ourJourneyInclusions', $this->paginate('OurJourneyInclusion'));
		$this->set('_serialize', array('ourJourneyInclusions'));
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
		
		$ourJourneyInclusions = $this->OurJourneyInclusion->find('list', $options);
		$this->set('ourJourneyInclusions', $ourJourneyInclusions);
		$this->set('_serialize', array('ourJourneyInclusions'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurJourneyInclusion->exists($id)) {
			throw new NotFoundException(__('Invalid our journey inclusion'));
		}
		$conditions = array('OurJourneyInclusion.' . $this->OurJourneyInclusion->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourJourneyInclusion', $this->OurJourneyInclusion->find('first', $options));
        $this->set('_serialize', array('ourJourneyInclusion'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {
		if ($this->request->is(array('post', 'put'))) {
			
			$this->request->data['OurJourny']['id'] = $journeyId;
			
			//debug($this->request->data);die;

			if ($this->OurJourneyInclusion->OurJourny->saveAll($this->request->data,['deep'=>true])) {

				$this->flash = array('message'=>'The our journey inclusion has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our journey inclusion could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else{
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyInclusion->OurJourny->find('first', $options);
		}

		$ourJournies = $this->OurJourneyInclusion->OurJourny->find('list');
		//debug($ourJournies);exit;
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
		if (!$this->OurJourneyInclusion->exists($id)) {
			throw new NotFoundException(__('Invalid our journey inclusion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurJourneyInclusion->save($this->request->data)) {
				$this->flash = array('message'=>__('The our journey inclusion has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our journey inclusion could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurJourneyInclusion.' . $this->OurJourneyInclusion->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyInclusion->find('first', $options);
		}
		$ourJournies = $this->OurJourneyInclusion->OurJourny->find('list');
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
