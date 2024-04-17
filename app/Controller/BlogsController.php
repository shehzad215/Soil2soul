<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BlogsController extends AppController {

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
	$this->Auth->allow('index','view','search_blog','search_results');
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
		$options['contain'] = ['BlogCategory','BlogTag'];
		$this->Blog->recursive = 0;
		$this->paginate = $options;
		$this->set('blogs', $this->paginate('Blog'));
		$this->set('_serialize', array('blogs'));
	}

/*Setup Index Page For Front-end Blogs*/
public function index(){
	$this->layout = 'home';
	$this->loadModel('OurJourny');
	/*Blog Categories*/
	$blogcategories = $this->Blog->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true],'contain'=>false]);

	/*Blog Listing*/
	$blogs = $this->Blog->find('all',['conditions'=>['Blog.active'=>true]]);

	// debug($blogs);exit;

	/*Blog Tags*/
	$blogTags = $this->Blog->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);

	$journeyListings = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false]);

	//debug($journeyListings);die;

	// debug($blogTags);exit;

	/*Set Compact*/
	$this->set(compact('blogcategories','blogs','blogTags','journeyListings'));
}

/*Blog Details Page*/	
public function view(){
	$this->layout = 'home';
	$this->loadModel('OurJourny');
	// debug($this->request);exit;
	$id = (isset($this->request->params['id'])) ? $this->request->params['id'] : '';
	$blogSlug = (isset($this->request->params['blog_slug'])) ? $this->request->params['blog_slug'] : '';
	
	$blog = $blogTags = $blogcategories = $blogs = '';
	
	if((!empty($id)) && (!empty($blogSlug))){
		$blog = $this->Blog->find('first',['conditions'=>['Blog.id'=>$id,'Blog.page_slug'=>$blogSlug],'contain'=>['BlogAuthor','BlogCategory','BlogComment'=>['conditions'=>['BlogComment.active'=>true],'order'=>['BlogComment.id'=>'DESC']],'BlogView']]);
		

		/*Blog Tags*/
		$blogTagsids = $this->Blog->BlogsBlogTag->find('list',['conditions'=>['BlogsBlogTag.blog_id'=>$id],'fields'=>['blog_tag_id']]);
		$blogTagsids = array_filter(array_unique($blogTagsids));
		$blogTags = $this->Blog->BlogTag->find('all',['conditions'=>['BlogTag.id'=>$blogTagsids],'contain'=>false]);

		/*Blog Categories*/
		$blogcategories = $this->Blog->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true,'BlogCategory.id !='=>$blog['Blog']['blog_category_id']],'contain'=>false,'limit'=>'6']);

		/*Blog Listing*/
		 $blogs = $this->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.id !='=>$id],'contain'=>['BlogCategory'], 'limit'=>'4','order'=>'rand()']);

		$journeyListings = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false]);


	}

	
	// debug($blog);exit;

	/*Set Compact*/
	$this->set(compact('blog','blogTags','blogcategories','blogs','id','journeyListings'));


}

/*Search Blog*/
public function search_blog()
{
	// debug($this->request->data);die;


	$options = array();
	$conditions = array();
	/*Search Text*/
	$searchText  = (!empty($this->request->data['searchText'])) ? $this->request->data['searchText'] : '';
	//debug($searchText);die; 
	$searchInput = '%'.$searchText.'%';
	$conditions = ['Blog.title LIKE'=>$searchInput,'Blog.active'=>true];
	$options['conditions'] = $this->Hetu->named_index($conditions);
	$options['contain'] = ['BlogCategory','BlogAuthor'];
	
	$blogs = $this->Blog->find('all',$options);

	// debug($blogs);exit;

	/*Set Compact*/
	$this->set(compact('blogs'));		


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
		
		$blogs = $this->Blog->find('list', $options);
		$this->set('blogs', $blogs);
		$this->set('_serialize', array('blogs'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$conditions = array('Blog.' . $this->Blog->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('blog', $this->Blog->find('first', $options));
        $this->set('_serialize', array('blog'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$currentDate = date('Y-m-d');
		$userId = $this->Auth->user('id');
		if ($this->request->is('post')) {
			$this->request->data['Blog']['user_id'] = $userId;
			if ($this->Blog->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The blog has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The blog could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$blogs = $this->Blog->find('first',['contain'=>false,'fields' => ['MAX(Blog.id)']]);
		$blogsid = $blogs['0']['MAX(`Blog`.`id`)'];
		$blogsid = (empty($blogsid)) ? 0 + 1 : $blogsid + 1;
		
		$blogcategories = $this->Blog->BlogCategory->find('list',['conditions'=>['BlogCategory.active'=>true]]);
		$blogTags = $this->Blog->BlogTag->find('list',['conditions'=>['BlogTag.active'=>true]]);
		$blogAuthors = $this->Blog->BlogAuthor->find('list',['conditions'=>['BlogAuthor.active'=>true],'fields'=>['id','author_name']]);

		$this->set(compact('currentDate','blogs','blogsid','blogcategories','blogTags','blogAuthors'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Blog->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>__('The blog has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The blog could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Blog.' . $this->Blog->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Blog->find('first', $options);
		}
		$blogs = $this->Blog->find('first',['contain'=>false,'fields' => ['MAX(Blog.id)']]);
		$blogsid = $id;
		$blogcategories = $this->Blog->BlogCategory->find('list',['conditions'=>['BlogCategory.active'=>true]]);
		$blogAuthors = $this->Blog->BlogAuthor->find('list',['conditions'=>['BlogAuthor.active'=>true],'fields'=>['id','author_name']]);
		$blogTags = $this->Blog->BlogTag->find('list',['conditions'=>['BlogTag.active'=>true]]);
		$this->set(compact('blogs','blogsid','blogcategories','blogTags','blogAuthors'));
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

	$blogsid = trim($this->request->data['blogsid']);

	// debug($serviceId);exit;

	 if (!empty($blogsid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Blog->id = $blogsid;
       	 if ($this->Blog->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}


}

