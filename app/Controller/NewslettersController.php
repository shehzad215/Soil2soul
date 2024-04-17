<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Newsletters Controller
 *
 * @property Newsletter $Newsletter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class NewslettersController extends AppController {

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
		$this->Auth->allow('add');
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
		
		$this->Newsletter->recursive = 0;
		$this->paginate = $options;
		$this->set('newsletters', $this->paginate('Newsletter'));
		$this->set('_serialize', array('newsletters'));
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
		
		$newsletters = $this->Newsletter->find('list', $options);
		$this->set('newsletters', $newsletters);
		$this->set('_serialize', array('newsletters'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter'));
		}
		$conditions = array('Newsletter.' . $this->Newsletter->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('newsletter', $this->Newsletter->find('first', $options));
        $this->set('_serialize', array('newsletter'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Newsletter->create();
			if ($this->Newsletter->save($this->request->data)) {
				$this->flash = array('message'=>'The newsletter has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The newsletter could not be saved. Please, try again.', 'class'=>'danger');
			}
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
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Newsletter->save($this->request->data)) {
				$this->flash = array('message'=>__('The newsletter has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The newsletter could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Newsletter.' . $this->Newsletter->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Newsletter->find('first', $options);
		}
	}

/**
*/
	public function add() {
		$this->autoRender = false;

		$status = '';
		$email = $this->request->data['value'];

		// debug($email);exit;

		/*Newslatter*/
		$newslatterData = $this->Newsletter->find('first',['conditions'=>['Newsletter.email'=>$email]]);

		if(empty($newslatterData)){
			$Newsletter['Newsletter']['email'] = $email;

			// debug($email);exit;

			if ($this->Newsletter->save($Newsletter)) {

				 $Email1 = new CakeEmail('default');
				 $Email1->template('mail_subscription')
				->viewVars(['data' =>$Newsletter,'admin'=>true])
   				->emailFormat('html')
  			    ->to($email)
  			    // ->to('shehzad@puratech.in')
   				 // ->to($email1)
  		    	  ->subject('New Subscription');
  			    try{$Email1->send();}catch(Exception $e){}

				$status = 'Thank You For Subscription !';
			}else{
				$status = 'Something went Wrong!';
			}
		}else{
			$status = 'Thank You For Subscription !';
		}
		
		return json_encode($status);

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
