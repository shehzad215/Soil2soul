<?php
App::uses('AppController', 'Controller');
/**
 * BlogAuthors Controller
 *
 * @property BlogAuthor $BlogAuthor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BlogAuthorsController extends AppController {

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

/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$blogauthorid = trim($this->request->data['blogauthorid']);

	// debug($serviceId);exit;

	 if (!empty($blogauthorid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->BlogAuthor->id = $blogauthorid;
       	 if ($this->BlogAuthor->saveField('active',$value)) {
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
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = false;
		$this->BlogAuthor->recursive = 0;
		$this->paginate = $options;
		$this->set('blogAuthors', $this->paginate('BlogAuthor'));
		$this->set('_serialize', array('blogAuthors'));
	}


/*For Blog Authur Index page*/
public function index(){
	$this->layout = 'home';

	/*Page Slug*/
	$pageSlug = (isset($this->request->params['blog_authur_slug'])) ? $this->request->params['blog_authur_slug'] : '';

	$blogAuthur = $blogDetails =  $blogs = $blogTags = $blogcategories = '';

	if(!empty($pageSlug)){

		$blogAuthur = $this->BlogAuthor->find('first',['conditions'=>['BlogAuthor.page_slug'=>$pageSlug],'contain'=>false]);

		if(!empty($blogAuthur)){
			$blogDetails = $this->BlogAuthor->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.blog_author_id'=>$blogAuthur['BlogAuthor']['id']],'contain'=>['BlogAuthor','BlogCategory']]);
				
			$blogs = $this->BlogAuthor->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.blog_author_id NOT IN ('.$blogAuthur['BlogAuthor']['id'].')']]);		

			/*Blog Categories*/
			$blogcategories = $this->Blog->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true],'contain'=>false,'limit'=>'6']);

		}

		$blogTags = $this->BlogAuthor->Blog->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
	}	

	/*Set Compact*/
	$this->set(compact('blogAuthur','blogDetails','blogs','blogTags','blogcategories'));


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
		
		$blogAuthors = $this->BlogAuthor->find('list', $options);
		$this->set('blogAuthors', $blogAuthors);
		$this->set('_serialize', array('blogAuthors'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogAuthor->exists($id)) {
			throw new NotFoundException(__('Invalid blog author'));
		}
		$conditions = array('BlogAuthor.' . $this->BlogAuthor->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('blogAuthor', $this->BlogAuthor->find('first', $options));
        $this->set('_serialize', array('blogAuthor'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->BlogAuthor->create();
			if ($this->BlogAuthor->save($this->request->data)) {
				$this->flash = array('message'=>'The blog author has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The blog author could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$blogsauthor= $this->BlogAuthor->find('first',['contain'=>false,'fields' => ['MAX(BlogAuthor.id)']]);
		$blogsauthorid = $blogsauthor['0']['MAX(`BlogAuthor`.`id`)'];
		$blogsauthorid = (empty($blogsauthorid)) ? 0 + 1 : $blogsauthorid + 1;
		$this->set(compact('blogsauthor','blogsauthorid'));
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
		if (!$this->BlogAuthor->exists($id)) {
			throw new NotFoundException(__('Invalid blog author'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogAuthor->save($this->request->data)) {
				$this->flash = array('message'=>__('The blog author has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The blog author could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('BlogAuthor.' . $this->BlogAuthor->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->BlogAuthor->find('first', $options);
		}
		$blogsauthorid = $id;		
		$this->set(compact('blogsauthorid'));
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
