<?php
App::uses('AppController', 'Controller');
/**
 * OurJourneyExlusions Controller
 *
 * @property OurJourneyExlusion $OurJourneyExlusion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurJourneyExlusionsController extends AppController {

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

	$exclusionid = trim($this->request->data['exclusionid']);

	// debug($serviceId);exit;

	 if (!empty($exclusionid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurJourneyExlusion->id = $exclusionid;
       	 if ($this->OurJourneyExlusion->saveField('active',$value)) {
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
		
		$this->OurJourneyExlusion->recursive = 0;
		$this->paginate = $options;
		$this->set('ourJourneyExlusions', $this->paginate('OurJourneyExlusion'));
		$this->set('_serialize', array('ourJourneyExlusions'));
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
		
		$ourJourneyExlusions = $this->OurJourneyExlusion->find('list', $options);
		$this->set('ourJourneyExlusions', $ourJourneyExlusions);
		$this->set('_serialize', array('ourJourneyExlusions'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurJourneyExlusion->exists($id)) {
			throw new NotFoundException(__('Invalid our journey exlusion'));
		}
		$conditions = array('OurJourneyExlusion.' . $this->OurJourneyExlusion->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourJourneyExlusion', $this->OurJourneyExlusion->find('first', $options));
        $this->set('_serialize', array('ourJourneyExlusion'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {

		if ($this->request->is(array('post', 'put'))) {
			
			$this->request->data['OurJourny']['id'] = $journeyId;
			
			//debug($this->request->data);exit;

			if ($this->OurJourneyExlusion->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The our journey exlusion has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our journey exlusion could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else {
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyExlusion->OurJourny->find('first', $options);
		}

		$ourJournies = $this->OurJourneyExlusion->OurJourny->find('list');
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
		if (!$this->OurJourneyExlusion->exists($id)) {
			throw new NotFoundException(__('Invalid our journey exlusion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurJourneyExlusion->save($this->request->data)) {
				$this->flash = array('message'=>__('The our journey exlusion has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our journey exlusion could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurJourneyExlusion.' . $this->OurJourneyExlusion->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyExlusion->find('first', $options);
		}
		$ourJournies = $this->OurJourneyExlusion->OurJourny->find('list');
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
