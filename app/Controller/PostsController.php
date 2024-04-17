<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/*
* beforeFilter method
*/
 	function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', false);
		$this->Auth->allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options = array();
		$conditions = array();
		$conditions = ['Post.active' => true];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$habtmModels = ['BlogsCategory'=>'blog_category_id'];
        foreach($habtmModels as $model=>$field) {
            $fieldName = implode('.', [$model, $field]);
            if($this->array_key_exists_recursive($fieldName, $options['conditions'])) {
                $this->Post->bindModel(array('hasOne' => array($model)), false);
                $options['contain'][] = $model;
            }
        }
        $options['order'] = ['Post.id'=>'DESC'];
        $options['limit'] = 4;
        $options['group'] = ['Post.id'];
		$this->Post->recursive = 0;
		$this->paginate = $options;
		$posts = $this->paginate('Post');

		if(Hash::get($posts, '0.Post.id')){
			foreach ($posts as $postkey => $post) {
				$countUserComments = $this->Post->BlogComment->find('count', ['conditions' => ['BlogComment.post_id' => $post['Post']['id'], 'BlogComment.active' => true]]);
				if(!empty($countUserComments) && $countUserComments != 0){
					$posts[$postkey]['Post']['totalUserComments'] = $countUserComments;
				}else{
					$posts[$postkey]['Post']['totalUserComments'] = 0;
				}
			}
		}

		$blogCategoriesLink = $this->Post->BlogCategory->find('list', ['order'=> ['BlogCategory.display_order'=>'ASC']]);
		$recentPosts = $this->Post->find('all', [
			'conditions' => ['Post.active' => true],
			'order'=> ['Post.id'=>'DESC'],
			'limit' => 5,
			'contain' => false
		]);
		$this->set(compact('posts', 'blogCategoriesLink', 'recentPosts'));
		$this->set('_serialize', array('posts', 'blogCategoriesLink', 'recentPosts'));
	}

/**
 * lists method
 *
 * @return void
 */
	// public function lists() {
	// 	$options = array();
	// 	$conditions = array();
	// 	$options['conditions'] = $this->Hetu->named_index($conditions);
		
	// 	$posts = $this->Post->find('list', $options);
	// 	$this->set('posts', $posts);
	// 	$this->set('_serialize', array('posts'));
	// }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug  = null) {
		$this->set('enableAjax', false);
		if (!$slug) {
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->find('first',[
			'conditions' => ['Post.active' => true, 'Post.slug' => $slug]
			]);
        $blogCategoriesLink = $this->Post->BlogCategory->find('list', ['order'=> ['BlogCategory.display_order'=>'ASC']]);
		$recentPosts = $this->Post->find('all', [
			'conditions' => ['Post.active' => true],
			'order'=> ['Post.id'=>'DESC'],
			'limit' => 5,
			'contain' => false
		]);


		$reviewDisableflag = 0;
		// if($this->Session->check('Auth.User.id')) {
		// 	//disable review link if user review / comment is les then 90 days
		// 	$blogCommentCreatedDate = $this->Post->BlogComment->find('first', [
		// 		'fields' => ['created'], 
		// 		'conditions' => [
		// 			'BlogComment.user_id' => $this->Auth->User('id'),
		// 			'BlogComment.post_id' => $post['Post']['id'],
		// 			//'BlogComment.active' => true
		// 		],
		// 		'order'=>[
		// 			'BlogComment.id' => 'DESC'
		// 		],
		// 		'limit'=>1 
		// 	]);
		// 	if($blogCommentCreatedDate){
		// 		$createDate = new DateTime($blogCommentCreatedDate['BlogComment']['created']);
		// 		$stripDate = $createDate->format('Y-m-d');
		// 		$now = time(); // or your date as well
		// 		$your_date = strtotime($stripDate);
		// 		$datediff = $now - $your_date;
		// 		$datediff = floor($datediff / (60 * 60 * 24));
		// 		$reviewDisableflag = ($datediff>=90)?0:1;
		// 	}
		// }



		$this->set(compact('post', 'blogCategoriesLink', 'recentPosts', 'reviewDisableflag'));
		$this->set('_serialize', array('post', 'blogCategoriesLink', 'recentPosts', 'reviewDisableflag'));
	}

/**
 * add method
 *
 * @return void
 */
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Post->create();
	// 		if ($this->Post->save($this->request->data)) {
	// 			$this->flash = array('message'=>'The post has been saved', 'class'=>'success');
	// 			$this->redirect = true;
	// 		} else {
	// 			$this->flash = array('message'=>'The post could not be saved. Please, try again.', 'class'=>'danger');
	// 		}
	// 	}
	// 	$parentPosts = $this->Post->ParentPost->find('list');
	// 	$templateLayouts = $this->Post->TemplateLayout->find('list');
	// 	$this->set(compact('parentPosts', 'templateLayouts'));
	// }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function edit($id = null) {
	// 	if (!$this->Post->exists($id)) {
	// 		throw new NotFoundException(__('Invalid post'));
	// 	}
	// 	if ($this->request->is(array('post', 'put'))) {
	// 		if ($this->Post->save($this->request->data)) {
	// 			$this->flash = array('message'=>__('The post has been saved'), 'class'=>'success');
	// 			$this->redirect = true;
	// 		} else {
	// 			$this->flash = array('message'=>__('The post could not be saved. Please, try again.'), 'class'=>'danger');
	// 		}
	// 	} else {
	// 		$conditions = array('Post.' . $this->Post->primaryKey => $id);
	// 		$options['conditions'] = $conditions;
	// 		$this->request->data = $this->Post->find('first', $options);
	// 	}
	// 	$parentPosts = $this->Post->ParentPost->find('list');
	// 	$templateLayouts = $this->Post->TemplateLayout->find('list');
	// 	$this->set(compact('parentPosts', 'templateLayouts'));
	// }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function delete($id = null, $confirm = null) {
	// 	parent::delete($id, $confirm);
	// }
	

/*
* beforeFilter method
*/

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$habtmModels = ['BlogsCategory'=>'blog_category_id'];
        foreach($habtmModels as $model=>$field) {
            $fieldName = implode('.', [$model, $field]);
            if($this->array_key_exists_recursive($fieldName, $options['conditions'])) {
                $this->Post->bindModel(array('hasOne' => array($model)), false);
                $options['contain'][] = $model;
            }
        }
        $options['order'] = ['Post.id'=>'DESC'];
        $options['group'] = ['Post.id'];
		$this->Post->recursive = 0;
		$this->paginate = $options;
		$posts = $this->paginate('Post');

		if(Hash::get($posts, '0.Post.id')){
			foreach ($posts as $postkey => $post) {
				$countUserComments = $this->Post->BlogComment->find('count', ['conditions' => ['BlogComment.post_id' => $post['Post']['id']]]);
				//debug($countUserComments);
				if(!empty($countUserComments) && $countUserComments != 0){
					$posts[$postkey]['Post']['totalUserComments'] = $countUserComments;
				}else{
					$posts[$postkey]['Post']['totalUserComments'] = 0;
				}
			}
		}
		$this->set(compact('posts'));
		$this->set('_serialize', array('posts'));

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
		
		$posts = $this->Post->find('list', $options);
		$this->set('posts', $posts);
		$this->set('_serialize', array('posts'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$conditions = array('Post.' . $this->Post->primaryKey => $id);
		$options['conditions'] = $conditions;
		$options['contain'] = [
			'BlogCategory.name',
		];
		$this->set('post', $this->Post->find('first', $options));
        $this->set('_serialize', array('post'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//$this->request->data['Post']['slug'] = Inflector::slug($this->request->data['Post']['title']);
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->flash = array('message'=>'The post has been saved', 'class'=>'success');
				$this->redirect = ['controller'=>'posts', 'action'=>'index', 'admin'=>true];
			} else {
				$this->flash = array('message'=>'The post could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$templateLayouts = $this->Post->TemplateLayout->find('list');
		$blogCategories = $this->Post->BlogCategory->find('list');
		$this->set(compact('parentPosts', 'templateLayouts', 'blogCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//$this->request->data['Post']['slug'] = Inflector::slug($this->request->data['Post']['title']);
			if ($this->Post->save($this->request->data)) {
				$this->flash = array('message'=>__('The post has been saved'), 'class'=>'success');
				$this->redirect = ['controller'=>'posts', 'action'=>'index', 'admin'=>true];
			} else {
				$this->flash = array('message'=>__('The post could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Post.' . $this->Post->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Post->find('first', $options);
		}
		$parentPosts = $this->Post->ParentPost->find('list');
		$templateLayouts = $this->Post->TemplateLayout->find('list');
		$blogCategories = $this->Post->BlogCategory->find('list');
		$this->set(compact('parentPosts', 'templateLayouts', 'blogCategories'));
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


/**
 * image_upload method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function image_upload() {
		$this->layout = false;
		$this->set('enableAjax', true);
        
		$fileName = $_FILES['userfile']['name'];
		$imageTypes = array("image/gif", "image/jpeg", "image/png");
		$fileTmpLoc = $_FILES["userfile"]["tmp_name"];
		$uploadPath = 'files/tinymce_uploads/'.$fileName;
		$moveResult = move_uploaded_file($fileTmpLoc, $uploadPath);
        	
        $file_name = $uploadPath;

		debug($file_name);

        $result = 'file_uploaded';
        $resultcode = 'ok';
        
		$this->set(compact('file_name', 'result', 'resultcode'));
	}

/**
 * admin_activeinactive method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_activeinactive($value, $id = []) {
		$data['Post.id'] = explode(',', $id);
		$this->Post->updateAll(
			array('Post.active' => $value),
			array($data)
			);
		$name = $value == '1' ? 'Activated' : 'InActivated';
		$this->flash = array('message'=>'Selected Posts has been '.$name.' successfully', 'class'=>'success');	
		$this->redirect = true;
	}
	
}
