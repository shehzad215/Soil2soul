<?php
App::uses('AppController', 'Controller');
/**
 * BlogCategories Controller
 *
 * @property BlogCategory $BlogCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BlogCategoriesController extends AppController {

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
	$this->Auth->allow('index','viewCount');
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
		
		$this->BlogCategory->recursive = 0;
		$this->paginate = $options;
		$this->set('blogCategories', $this->paginate('BlogCategory'));
		$this->set('_serialize', array('blogCategories'));
	}

/*Setup Index Page For Front-end Blogs*/
public function index(){
	$this->layout = 'home';
	$this->loadModel('OurJourny');

	/*Page Slug*/
	$pageSlug = (isset($this->request->params['blog_cat_slug'])) ? $this->request->params['blog_cat_slug'] : '';
	$blogCategory = $blogDetails =  $blogs = $blogTags = $blogcategories = '';

	
	if(!empty($pageSlug)){

		$blogCategory = $this->BlogCategory->find('first',['conditions'=>['BlogCategory.page_slug'=>$pageSlug],'contain'=>false]);

		if(!empty($blogCategory)){
			$blogDetails = $this->BlogCategory->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.blog_category_id'=>$blogCategory['BlogCategory']['id']],'contain'=>['BlogAuthor','BlogCategory']]);

			
			$blogs = $this->BlogCategory->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.blog_category_id NOT IN ('.$blogCategory['BlogCategory']['id'].')']]);	


			/*Blog Categories*/
			$blogcategories = $this->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true],'contain'=>false,'limit'=>'6']);

			

		}else{
			// Redirect to 404 error page
	   		 throw new NotFoundException();
		}
		// debug($blogcategories);exit;
	}	
	
	$journeyListings = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false]);

	$blogTags = $this->BlogCategory->Blog->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	
	/*Set Compact*/
	$this->set(compact('blogDetails','blogs','blogTags','blogcategories','blogCategory','journeyListings'));

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
		
		$blogCategories = $this->BlogCategory->find('list', $options);
		$this->set('blogCategories', $blogCategories);
		$this->set('_serialize', array('blogCategories'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogCategory->exists($id)) {
			throw new NotFoundException(__('Invalid blog category'));
		}
		$conditions = array('BlogCategory.' . $this->BlogCategory->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('blogCategory', $this->BlogCategory->find('first', $options));
        $this->set('_serialize', array('blogCategory'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlogCategory->create();
			if ($this->BlogCategory->save($this->request->data)) {
				$this->flash = array('message'=>'The blog category has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The blog category could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$blogscat = $this->BlogCategory->find('first',['contain'=>false,'fields' => ['MAX(BlogCategory.id)']]);
		$blogscatid = $blogscat['0']['MAX(`BlogCategory`.`id`)'];
		$blogscatid = (empty($blogscatid)) ? 0 + 1 : $blogscatid + 1;
		$this->set(compact('blogscat','blogscatid'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlogCategory->exists($id)) {
			throw new NotFoundException(__('Invalid blog category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogCategory->save($this->request->data)) {
				$this->flash = array('message'=>__('The blog category has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The blog category could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('BlogCategory.' . $this->BlogCategory->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->BlogCategory->find('first', $options);
		}
		$blogscat = $this->BlogCategory->find('first',['contain'=>false,'fields' => ['MAX(BlogCategory.id)']]);
		$blogscatid = $id;
		$this->set(compact('blogscat','blogscatid'));
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
       	$this->BlogCategory->id = $blogsid;
       	 if ($this->BlogCategory->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
	}


/*Search Results*/
public function viewCount(){
	$this->loadModel('BlogView');
	$this->autoRender = false;
	// debug($this->request->data);exit;

	$id = $this->request->data['id'];
	$ipAddress = (isset($this->request->data['ipAddress'])) ? $this->request->data['ipAddress'] : '';

	$blogView = $this->BlogView->find('first',['conditions'=>['BlogView.ip_address'=>$ipAddress,'BlogView.blog_id'=>$id],'contain'=>false]);

	$blogViewArr = [];
	if(empty($blogView)){
		$blogViewArr['BlogView']['blog_id'] = $id;
		$blogViewArr['BlogView']['ip_address'] = $ipAddress;
		if ($this->BlogView->save($blogViewArr)) {
			echo "Count Added!";
		}	
	}else{
		echo "Already Added!";
	}

}



}
