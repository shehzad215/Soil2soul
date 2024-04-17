<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class VideosController extends AppController {

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
$this->Auth->allow('index','search_video','show_details');
}

/**
/*Search Video*/
public function search_video()
{
	//debug($this->request->data);die;
	$options = array();
	$conditions = array();
	/*Search Text*/
	$searchText  = (!empty($this->request->data['searchText'])) ? $this->request->data['searchText'] : '';
	//debug($searchText);die; 
	$searchInput = '%'.$searchText.'%';
	$conditions = ['Video.title LIKE'=>$searchInput,'Video.active'=>true];
	$options['conditions'] = $this->Hetu->named_index($conditions);
	$options['contain'] = ['VideoCategory','BlogTag'];
	
	$videos = $this->Video->find('all',$options);

	//debug($videos);exit;

	/*Set Compact*/
	$this->set(compact('videos'));		
}

/*Our Scholar Details*/
public function show_details(){
	// debug($this->request->data);exit;
	$videoId = $this->request->data['videoId'];

	//debug($videoId);die;

   	$videoDetails = $this->Video->find('first',['conditions'=>['Video.id'=>$videoId]]);

	//debug($videoDetails);die;
	// $schoLarDetails = $this->OurScholarDetail->find('first',['conditions'=>['OurScholarDetail.our_journy_id'=>$journeyId,'OurScholarDetail.our_team_id'=>$scholarId],'contain'=>['OurTeam']]);

	// debug($schoLarDetails);exit;
	/*Set Compact*/
	$this->set(compact('videoDetails'));

}
/**	
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$currentaction = $this->request->params['action'];
		$options['contain'] = ['VideoCategory','BlogTag'];
		
		 $conditions = ($currentaction == 'index') ? $conditions = ['Video.active'=>true] : [];
		

		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->Video->recursive = 0;
		$this->paginate = $options;
		$this->set('videos', $this->paginate('Video'));
		$this->set('_serialize', array('videos'));
	}
/**	
*/
	public function index() {
	   $this->layout = 'home';	 		
	   $this->admin_index();

		/*Video Categories*/
		$videocategories = $this->Video->VideoCategory->find('all',['conditions'=>['VideoCategory.active'=>true],'contain'=>false]);
		
		//debug($videocategories);die;

		$randomVideos = $this->Video->find('all', ['conditions' => ['Video.active' => true],
			'order' => 'RAND()','limit' => 3,'contain'=>false]);
		//debug($randomVideos);die;

	   	$blogTags = $this->Video->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	   	//debug($blogTags);die;
		$this->set(compact('blogTags','videocategories','randomVideos'));
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
		
		$videos = $this->Video->find('list', $options);
		$this->set('videos', $videos);
		$this->set('_serialize', array('videos'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$conditions = array('Video.' . $this->Video->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('video', $this->Video->find('first', $options));
        $this->set('_serialize', array('video'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {	
			if ($this->Video->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The video has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The video could not be saved. Please, try again.', 'class'=>'danger');
			}
		}

		$videocategories = $this->Video->VideoCategory->find('list',['conditions'=>['VideoCategory.active'=>true]]);

		//debug($videocategories);die;

		$blogTags = $this->Video->BlogTag->find('list',['conditions'=>['BlogTag.active'=>true]]);
		$this->set(compact('blogTags','videocategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Video->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>__('The video has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The video could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Video.' . $this->Video->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Video->find('first', $options);
		}

		$videocategories = $this->Video->VideoCategory->find('list',['conditions'=>['VideoCategory.active'=>true]]);
		$blogTags = $this->Video->BlogTag->find('list',['conditions'=>['BlogTag.active'=>true]]);
		$this->set(compact('blogTags','videocategories'));
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

	$videoid = trim($this->request->data['videoid']);

	// debug($serviceId);exit;

	 if (!empty($videoid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Video->id = $videoid;
       	 if ($this->Video->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}
	/*For Display Review of Homepage*/
public function admin_display_homepage(){
	$this->autoRender = false;

	$videoid = trim($this->request->data['videoid']);

	// debug($serviceId);exit;

	 if (!empty($videoid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Video->id = $videoid;
       	 if ($this->Video->saveField('is_display_homepage',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

}
