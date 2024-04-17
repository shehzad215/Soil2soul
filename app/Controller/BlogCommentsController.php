<?php
App::uses('AppController', 'Controller');
/**
 * BlogComments Controller
 *
 * @property BlogComment $BlogComment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BlogCommentsController extends AppController {

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
	$this->Auth->allow('add');
}
/**
	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$commentid = trim($this->request->data['commentid']);

	// debug($serviceId);exit;

	 if (!empty($commentid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->BlogComment->id = $commentid;
       	 if ($this->BlogComment->saveField('active',$value)) {
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
		
		$options['contain']=['Blog'];
		$conditions = ['BlogComment.token !='=>null];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->BlogComment->recursive = 0;
		$this->paginate = $options;
		$this->set('blogComments', $this->paginate('BlogComment'));
		$this->set('_serialize', array('blogComments'));
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
		
		$blogComments = $this->BlogComment->find('list', $options);
		$this->set('blogComments', $blogComments);
		$this->set('_serialize', array('blogComments'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogComment->exists($id)) {
			throw new NotFoundException(__('Invalid blog comment'));
		}
		$conditions = array('BlogComment.' . $this->BlogComment->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('blogComment', $this->BlogComment->find('first', $options));
        $this->set('_serialize', array('blogComment'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$blog_id = ($this->request->params['pass']['0']);
			$this->request->data['BlogComment']['blog_id'] = $blog_id;
			
			// debug($this->request->data);

			/*Session Captcha Code*/	
			 $captachSessinCode =  $this->Session->read('CAPTCHA_CODE');
			 $token = $this->request->data['BlogComment']['token'];

			 // debug($captachSessinCode);exit;
			if($captachSessinCode == $token){ 
				if ($this->BlogComment->save($this->request->data)) {
					$this->flash = array('message'=>'The blog comment has been saved', 'class'=>'success');
					$this->redirect = true;
				} else {
					$this->flash = array('message'=>'The blog comment could not be saved. Please, try again.', 'class'=>'danger');
				}
			}
		}
		$blogs = $this->BlogComment->Blog->find('list');
		$this->set(compact('blogs'));
	}

/**
**/
 
public function add($blogId){
	$this->admin_add($blogId);
}
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlogComment->exists($id)) {
			throw new NotFoundException(__('Invalid blog comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogComment->save($this->request->data)) {
				$this->flash = array('message'=>__('The blog comment has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The blog comment could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('BlogComment.' . $this->BlogComment->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->BlogComment->find('first', $options);
		}
		$blogs = $this->BlogComment->Blog->find('list');
		$this->set(compact('blogs'));
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
