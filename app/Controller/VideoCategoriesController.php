<?php
App::uses('AppController', 'Controller');
/**
 * VideoCategories Controller
 *
 * @property VideoCategory $VideoCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class VideoCategoriesController extends AppController {

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
	$this->Auth->allow('index');
}
/*Setup Index Page For Front-end Blogs*/
public function index(){
	$this->layout = 'home';

	$pageSlug = (isset($this->request->params['video_cat_slug'])) ? $this->request->params['video_cat_slug'] : '';

	//debug($pageSlug);

	$videoCategory = $videoDetails =  $randomVideos = $blogTags = '';

		if(!empty($pageSlug)){

		$videoCategory = $this->VideoCategory->find('first',['conditions'=>['VideoCategory.page_slug'=>$pageSlug],'contain'=>false]);

		$catName = $videoCategory['VideoCategory']['name'];

		//debug($catName);die;

		if(!empty($videoCategory)){
			$videoDetails = $this->VideoCategory->Video->find('all',['conditions'=>['Video.active'=>true,'Video.video_category_id'=>$videoCategory['VideoCategory']['id']]]);

			//debug($videos);die;

			$randomVideos = $this->VideoCategory->Video->find('all',['conditions'=>['Video.active'=>true,'Video.video_category_id NOT IN ('.$videoCategory['VideoCategory']['id'].')'],'order' => 'RAND()','limit' => 3]);

	  	//debug($videoDetails);die;						
		}
		// debug($blogcategories);exit;
	}
	$videoTags = $this->VideoCategory->Video->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	/*Set Compact*/
	$this->set(compact('videoCategory','videoDetails','randomVideos','videoTags','catName'));

}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$options['contain']=false;
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->VideoCategory->recursive = 0;
		$this->paginate = $options;
		$this->set('videoCategories', $this->paginate('VideoCategory'));
		$this->set('_serialize', array('videoCategories'));
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
		
		$videoCategories = $this->VideoCategory->find('list', $options);
		$this->set('videoCategories', $videoCategories);
		$this->set('_serialize', array('videoCategories'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->VideoCategory->exists($id)) {
			throw new NotFoundException(__('Invalid video category'));
		}
		$conditions = array('VideoCategory.' . $this->VideoCategory->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('videoCategory', $this->VideoCategory->find('first', $options));
        $this->set('_serialize', array('videoCategory'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->VideoCategory->create();
			if ($this->VideoCategory->save($this->request->data)) {
				$this->flash = array('message'=>'The video category has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The video category could not be saved. Please, try again.', 'class'=>'danger');
			}
		$videocat = $this->VideoCategory->find('first',['contain'=>false,'fields' => ['MAX(VideoCategory.id)']]);
		$videocatid = $videocat['0']['MAX(`VideoCategory`.`id`)'];
		$videocatid = (empty($videocatid)) ? 0 + 1 : $videocatid + 1;
		$this->set(compact('videocat','videocatid'));
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
		if (!$this->VideoCategory->exists($id)) {
			throw new NotFoundException(__('Invalid video category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->VideoCategory->save($this->request->data)) {
				$this->flash = array('message'=>__('The video category has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The video category could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('VideoCategory.' . $this->VideoCategory->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->VideoCategory->find('first', $options);
		}
		$videocat = $this->VideoCategory->find('first',['contain'=>false,'fields' => ['MAX(VideoCategory.id)']]);
		$videocatid = $id;
		$this->set(compact('videocat','videocatid'));
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
