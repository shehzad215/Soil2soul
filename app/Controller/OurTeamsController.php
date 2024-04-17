<?php
App::uses('AppController', 'Controller');
/**
 * OurTeams Controller
 *
 * @property OurTeam $OurTeam
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurTeamsController extends AppController {

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
$this->Auth->allow('index','view','scholar','mentor');
}
/**
	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$ourteamid = trim($this->request->data['ourteamid']);

	// debug($serviceId);exit;

	 if (!empty($ourteamid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurTeam->id = $ourteamid;
       	 if ($this->OurTeam->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}
	/*For Display Review of Scholar*/
public function admin_its_scholar(){
	$this->autoRender = false;

	$ourteamid = trim($this->request->data['ourteamid']);

	// debug($serviceId);exit;

	 if (!empty($ourteamid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurTeam->id = $ourteamid;
       	 if ($this->OurTeam->saveField('its_scholar',$value)) {
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

	$teamTypeId = $teamTypeConditions = '';
	/*Age Groups*/
		if(isset($this->request->params['named']['OurTeamType.id']) && !empty($this->request->params['named']['OurTeamType.id'])){
			$teamTypeId = $this->request->params['named']['OurTeamType.id'];
			unset($this->request->params['named']['OurTeamType.id']);
			
			$teamtypeData = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>$teamTypeId],'fields'=>['our_team_id']]);

			//debug($teamtypeData);die;

			$teamtypeDataId = array_filter(array_unique($teamtypeData));
			$teamtypeDataId = implode(',',$teamtypeDataId);
			if(empty($teamtypeDataId)){$teamtypeDataId = 0;}

			$teamTypeConditions = 'OurTeam.id IN ('.$teamtypeDataId.')';

		}


	$options['contain']=['OurTeamType'];
	$conditions = [$teamTypeConditions];
	$options['conditions'] = $this->Hetu->named_index($conditions);

	$this->OurTeam->recursive = 0;
	$this->paginate = $options;
	$this->set('ourTeams', $this->paginate('OurTeam'));
	$this->set('_serialize', array('ourTeams'));

	$ourteams = $this->OurTeam->find('list');
	/*debug($ourTeams);die;*/
	$teamsValue = (isset($this->request->params['named']['OurTeam.id'])) ? $this->request->params['named']['OurTeam.id'] : '';

	$ourTeamtypes = $this->OurTeam->OurTeamType->find('list');

	if(!empty($teamTypeId)){
		 	$this->request->params['named']['OurTeamType.id'] = $teamTypeId;
	}
	//debug($ourTeamtypes);die;

	$activeValue = (isset($this->request->params['named']['OurTeam.active'])) ? $this->request->params['named']['OurTeam.active'] : '';

	/*Set Compact*/
	$this->set(compact('activeValue','ourteams','teamsValue','ourTeamtypes','teamTypeId'));
}

/*For Front-end Pages*/
public function index(){
	$this->loadModel('OurTeamType');
	$this->layout = 'home';
	

	$ourTeamId = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>1],'fields'=>['our_team_id']]);
	$ourTeamId = array_filter((array_unique($ourTeamId)));

	/*debug($ourTeams);die;*/
	$ourTeams = $this->OurTeam->find('all', ['conditions' => ['OurTeam.active' => true,'OurTeam.id'=>$ourTeamId],
    'contain' => false,
]);

	// debug($ourTeams);die;

	/*Set Compact*/
	$this->set(compact('ourTeams'));
}

/*For Front-end Pages*/
public function scholar(){
	$this->layout = 'home';
	
	/*Our Teams*/
	$ourTeamId = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>2],'fields'=>['our_team_id']]);
	$ourTeamId = array_filter((array_unique($ourTeamId)));

	/*debug($ourTeamId);die;*/
	
	$ourTeams = $this->OurTeam->find('all', ['conditions' => ['OurTeam.active' => true,'OurTeam.id'=>$ourTeamId],
    'contain' => false,
]);

	/*Set Compact*/
	$this->set(compact('ourTeams'));
}

/*For Front-end Pages*/
public function mentor(){
	$this->layout = 'home';
	
	/*Our Teams*/
	$ourTeamId = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>3],'fields'=>['our_team_id']]);
	$ourTeamId = array_filter((array_unique($ourTeamId)));

	/*debug($ourTeams);die;*/
	$ourTeams = $this->OurTeam->find('all', ['conditions' => ['OurTeam.active' => true,'OurTeam.id'=>$ourTeamId],
    'contain' => false,
]);

	/*Set Compact*/
	$this->set(compact('ourTeams'));
}

/*Front-end Detail Page*/
public function view(){
	$this->layout = 'home';
	//debug($this->request->params);die;
	$teamSlug = (isset($this->request->params['team_slug'])) ? $this->request->params['team_slug'] : '';

	$ourTeam = $this->OurTeam->find('first',['conditions'=>['OurTeam.page_slug'=>$teamSlug],'contain'=>['OurTeamType']]);

	/*Team Type*/
	$teamTypeIds = Hash::extract($ourTeam,'OurTeamType.{n}.OurTeamsOurTeamType.our_team_type_id');
	$teamTypeIds = array_filter(array_unique($teamTypeIds));

	// debug($teamTypeIds);

	$ourTeamType = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>$teamTypeIds],'fields'=>['our_team_id']]);

	$ourTeamType = array_filter(array_unique($ourTeamType));

	// debug($ourTeamType);exit;

	$otherTeams = $this->OurTeam->find('all', [
	    'conditions' => [
	        'NOT' => ['OurTeam.id' => $ourTeam['OurTeam']['id']],
	        'OurTeam.id'=>$ourTeamType,
	        'OurTeam.active' => true
	    ],
	    'contain'=>false
	]); 

	// debug($otherTeams);die;

	/*Set Compact*/
	$this->set(compact('ourTeam','otherTeams'));
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
		
		$ourTeams = $this->OurTeam->find('list', $options);
		$this->set('ourTeams', $ourTeams);
		$this->set('_serialize', array('ourTeams'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurTeam->exists($id)) {
			throw new NotFoundException(__('Invalid our team'));
		}
		$conditions = array('OurTeam.' . $this->OurTeam->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourTeam', $this->OurTeam->find('first', $options));
        $this->set('_serialize', array('ourTeam'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			if ($this->OurTeam->saveAll($this->request->data)) {
				$this->flash = array('message'=>'The our team has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The our team could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
	$ourTeamTypes = $this->OurTeam->OurTeamType->find('list',['conditions'=>['OurTeamType.active'=>true]]);
		//debug($ourTeamTypes);die;
		$ourJournies = $this->OurTeam->OurJourny->find('list');
		$this->set(compact('ourJournies','ourTeamTypes'));
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
		if (!$this->OurTeam->exists($id)) {
			throw new NotFoundException(__('Invalid our team'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurTeam->saveAll($this->request->data)) {
				$this->flash = array('message'=>__('The our team has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The our team could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurTeam.' . $this->OurTeam->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurTeam->find('first', $options);
		}
		$ourTeamTypes = $this->OurTeam->OurTeamType->find('list',['conditions'=>['OurTeamType.active'=>true]]);
		$ourJournies = $this->OurTeam->OurJourny->find('list');
		$this->set(compact('ourJournies','ourTeamTypes'));
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
