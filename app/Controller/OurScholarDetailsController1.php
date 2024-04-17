<?php
App::uses('AppController', 'Controller');
/**
 * OurScholarDetails Controller
 *
 * @property OurScholarDetail $OurScholarDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurScholarDetailsController extends AppController {

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
	$this->set('enableAjax', true);
	$this->Auth->allow('scholar_details');
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
		$options['contain'] = ['OurJourny','OurTeam'];
		$this->OurScholarDetail->recursive = 0;
		$this->paginate = $options;
		$this->set('ourScholarDetails', $this->paginate('OurScholarDetail'));
		$this->set('_serialize', array('ourScholarDetails'));
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
		
		$ourScholarDetails = $this->OurScholarDetail->find('list', $options);
		$this->set('ourScholarDetails', $ourScholarDetails);
		$this->set('_serialize', array('ourScholarDetails'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurScholarDetail->exists($id)) {
			throw new NotFoundException(__('Invalid our scholar detail'));
		}
		$conditions = array('OurScholarDetail.' . $this->OurScholarDetail->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourScholarDetail', $this->OurScholarDetail->find('first', $options));
        $this->set('_serialize', array('ourScholarDetail'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		$our_journy_id = (isset($this->request->params['named']['OurScholarDetail.our_journy_id'])) ? $this->request->params['named']['OurScholarDetail.our_journy_id'] : '';
		// debug($our_journy_id);exit;	
		if ($this->request->is('post')) {
			$this->OurScholarDetail->create();
			if ($this->OurScholarDetail->save($this->request->data)) {
				$this->flash = array('message'=>'The our scholar detail has been saved', 'class'=>'success');
				$this->redirect = (!empty($our_journy_id)) ? ['action'=>'index', 'OurScholarDetail.our_journy_id'=>$our_journy_id] : ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The our scholar detail could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		
		
		$ourJournies = (!empty($our_journy_id)) ? $this->OurScholarDetail->OurJourny->find('list',['conditions'=>['OurJourny.id'=>$our_journy_id]]) : $this->OurScholarDetail->OurJourny->find('list',['conditions'=>['OurJourny.active'=>true]]) ;

		
		/*Our Team*/	
		if(!empty($our_journy_id)){

			$ourJourney = $this->OurScholarDetail->OurJourny->find('first',['conditions'=>['OurJourny.id'=>$our_journy_id],'contain'=>['OurTeam'=>['conditions'=>['OurTeam.active'=>true]]],'fields'=>['id']]);

			$ourTeamId = hash::extract($ourJourney,'OurTeam.{n}.id');

			$ourTeams = $this->OurScholarDetail->OurTeam->find('list',['conditions'=>['OurTeam.id'=>$ourTeamId]]);

		}else{
			$ourTeams = $this->OurScholarDetail->OurTeam->find('list');
		}	

		// debug($ourTeams);exit;

		
		$this->set(compact('ourJournies', 'ourTeams'));
	
	
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OurScholarDetail->exists($id)) {
			throw new NotFoundException(__('Invalid our scholar detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurScholarDetail->save($this->request->data)) {
				$this->flash = array('message'=>__('The our scholar detail has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our scholar detail could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurScholarDetail.' . $this->OurScholarDetail->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurScholarDetail->find('first', $options);
		}
		$ourJournies = $this->OurScholarDetail->OurJourny->find('list');
		$ourTeams = $this->OurScholarDetail->OurTeam->find('list');
		$this->set(compact('ourJournies', 'ourTeams'));
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
