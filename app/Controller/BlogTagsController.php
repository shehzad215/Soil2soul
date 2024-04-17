<?php
App::uses('AppController', 'Controller');
/**
 * BlogTags Controller
 *
 * @property BlogTag $BlogTag
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BlogTagsController extends AppController {

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
	$this->Auth->allow('index','view','video_tags');
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
		
		$this->BlogTag->recursive = 0;
		$this->paginate = $options;
		$this->set('blogTags', $this->paginate('BlogTag'));
		$this->set('_serialize', array('blogTags'));
	}

/*For Front-snd*/
public function index(){
	$this->layout = 'home';
	$this->loadModel('OurJourny');
	$this->loadModel('BlogCategory');
	//debug($this->request->params);die;
	/*Page Slug*/
	$pageSlug = (isset($this->request->params['blog_tag_slug'])) ? $this->request->params['blog_tag_slug'] : '';
	$blogCategory = $blogDetails =  $blogs = $blogTags = $blogcategories = '';

	
	if(!empty($pageSlug)){

		$blogTag = $this->BlogTag->find('first',['conditions'=>['BlogTag.page_slug'=>$pageSlug],'contain'=>false]);

		if(!empty($blogTag)){
			$blogDetails = $this->BlogTag->find('all', [
			    'conditions' => ['BlogTag.page_slug' => $pageSlug],
			    'contain' => [
			        'Blog' => [
			            'conditions' => ['Blog.active' => true],
			            'BlogCategory', // Include BlogCategories
			            'BlogAuthor' // Include Author
			        ]
			    ]
			]);

			$blogId = Hash::extract($blogDetails,'{n}.Blog.{n}.id');
			$blogId = array_filter(array_unique($blogId));


			$blogs = $this->BlogTag->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.id !='=>$blogId],'contain'=>['BlogAuthor','BlogCategory']]);	

			//debug($blogs);exit;

			/*Blog Categories*/
			$blogcategories = $this->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true],'contain'=>false,'limit'=>'6']);

			$journeyListings = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false]);

			//debug($blogcategories);die;

		}else{
			// Redirect to 404 error page
	   		 throw new NotFoundException();
		}
		
	}	
	

	$blogTags = $this->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	
	/*Set Compact*/
	$this->set(compact('blogDetails','blogTag','blogTags','blogcategories','blogs','journeyListings'));

}	


/*For Front-end*/
public function video_tags(){
	$this->layout = 'home';

	/*Page Slug*/
	$pageSlug = (isset($this->request->params['video_tag_slug'])) ? $this->request->params['video_tag_slug'] : '';

	//debug($pageSlug);die;
	  $videos = $blogTags = $randomVideos = '';

	
	if(!empty($pageSlug)){

		$blogTag = $this->BlogTag->find('first',['conditions'=>['BlogTag.page_slug'=>$pageSlug],'contain'=>false]);

		//debug($blogTag);die;

		if(!empty($blogTag)){

			$videos = $this->BlogTag->find('all', [
			    'conditions' => ['BlogTag.page_slug' => $pageSlug],
			    'contain' => [
			        'Video' => [
			            'conditions' => ['Video.active' => true],
			            'VideoCategory' // Include Author
			        ]
			    ]
			]);

			//debug($videos);

			$videoId = Hash::extract($videos,'{n}.Video.{n}.id');
			$videoId = array_filter(array_unique($videoId));


			$randomVideos = $this->BlogTag->Video->find('all',['conditions'=>['Video.active'=>true,'Video.id !='=>$videoId],'contain'=>false,'order' => 'RAND()','limit' => 3,]);	

			//debug($randomVideos);exit;

		}else{
			// Redirect to 404 error page
	   		 throw new NotFoundException();
		}
		
	}	
	
	/*Video Categories*/
	$videocategories = $this->Video->VideoCategory->find('all',['conditions'=>['VideoCategory.active'=>true],'contain'=>false]);

	$videoTags = $this->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	
	/*Set Compact*/
	$this->set(compact('videos','randomVideos','videoTags','videocategories'));

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
		
		$blogTags = $this->BlogTag->find('list', $options);
		$this->set('blogTags', $blogTags);
		$this->set('_serialize', array('blogTags'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogTag->exists($id)) {
			throw new NotFoundException(__('Invalid blog tag'));
		}
		$conditions = array('BlogTag.' . $this->BlogTag->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('blogTag', $this->BlogTag->find('first', $options));
        $this->set('_serialize', array('blogTag'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlogTag->create();
			if ($this->BlogTag->save($this->request->data)) {
				$this->flash = array('message'=>'The blog tag has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The blog tag could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$blogstag= $this->BlogTag->find('first',['contain'=>false,'fields' => ['MAX(BlogTag.id)']]);
		$blogstagid = $blogstag['0']['MAX(`BlogTag`.`id`)'];
		$blogstagid = (empty($blogstagid)) ? 0 + 1 : $blogstagid + 1;
		$this->set(compact('blogstag','blogstagid'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlogTag->exists($id)) {
			throw new NotFoundException(__('Invalid blog tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogTag->save($this->request->data)) {
				$this->flash = array('message'=>__('The blog tag has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The blog tag could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('BlogTag.' . $this->BlogTag->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->BlogTag->find('first', $options);
		}
		$blogstagid = $id;		
		$this->set(compact('blogstagid'));
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

public function admin_is_active(){
	$this->autoRender = false;

	$blogsid = trim($this->request->data['blogsid']);

	// debug($serviceId);exit;

	 if (!empty($blogsid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->BlogTag->id = $blogsid;
       	 if ($this->BlogTag->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

}
