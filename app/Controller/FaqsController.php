<?php
App::uses('AppController', 'Controller');
/**
 * Faqs Controller
 *
 * @property Faq $Faq
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FaqsController extends AppController {

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
/**
	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$faqid = trim($this->request->data['faqid']);

	// debug($serviceId);exit;

	 if (!empty($faqid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Faq->id = $faqid;
       	 if ($this->Faq->saveField('active',$value)) {
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
		$options = $conditions = array();

		$action = (isset($this->request->params['action'])) ? $this->request->params['action'] : '';

		$conditions = ($action == 'index') ? ['Faq.faq_type_id'=>'1','Faq.active'=>true] : ['Faq.faq_type_id'=>'1'];
		$options['contain']=['OurJourny','FaqType'];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		if($action != 'index'){
			$this->Faq->recursive = 0;
			$this->paginate = $options;
			$this->set('faqs', $this->paginate('Faq'));
			$this->set('_serialize', array('faqs'));
		}else{
			$faqs = $this->Faq->find('all',$options);

			/*Set compact*/
			$this->set(compact('faqs'));
		}

	}

	/*Setup Index Page For Front-end Blogs*/
public function index(){
	$this->layout = 'home';
	$this->admin_index();
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
		
		$faqs = $this->Faq->find('list', $options);
		$this->set('faqs', $faqs);
		$this->set('_serialize', array('faqs'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Faq->exists($id)) {
			throw new NotFoundException(__('Invalid faq'));
		}
		$conditions = array('Faq.' . $this->Faq->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('faq', $this->Faq->find('first', $options));
        $this->set('_serialize', array('faq'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {

		// $this->request->data['Faq']['faq_type_id'] = '2';

			if ($this->request->is(array('post', 'put'))) {



				$this->request->data['OurJourny']['id'] = $journeyId;
				// debug($this->request->data);die;
				

			if ($this->Faq->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The faq has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The faq could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else{
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Faq->OurJourny->find('first', $options);
		}

		$ourJournies = $this->Faq->OurJourny->find('list');
		$this->set(compact('ourJournies','journeyId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$generalFaq = $this->Faq->FaqType->find('list',['conditions'=>['FaqType.id'=>'1']]);
		if (!$this->Faq->exists($id)) {
			throw new NotFoundException(__('Invalid faq'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Faq->save($this->request->data)) {
				$this->flash = array('message'=>__('The faq has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The faq could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Faq.' . $this->Faq->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Faq->find('first', $options);
		}
		$ourJournies = $this->Faq->OurJourny->find('list');
		$this->set(compact('ourJournies','generalFaq'));
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_general_add() {
		
		$generalFaq = $this->Faq->FaqType->find('list',['conditions'=>['FaqType.id'=>'1']]);
		//debug($generalFaq);die;
		$this->request->data['Faq']['faq_type_id'] = 1;
		
		//debug($generalFaq);die;
		if ($this->request->is('post')) {
			$this->Faq->create();
			if ($this->Faq->save($this->request->data)) {
				$this->flash = array('message'=>'The Faq has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The Faq could not be saved. Please, try again.', 'class'=>'danger');
			}
		}

		$this->set(compact('generalFaq'));
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
