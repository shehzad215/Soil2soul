<?php
App::uses('AppController', 'Controller');
/**
 * Testimonials Controller
 *
 * @property Testimonial $Testimonial
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TestimonialsController extends AppController {

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
		$this->Auth->allow('add','index','show_testimonials');
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$options['contain']=['OurJourny'];
		$currentaction = $this->request->params['action'];
		if($currentaction == 'index'){
		  $conditions = ['Testimonial.active'=>true];
		}else{
		  $conditions = array();	
		}
		
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->Testimonial->recursive = 0;
		$this->paginate = $options;
		$this->set('testimonials', $this->paginate('Testimonial'));
		$this->set('_serialize', array('testimonials'));

	}

/**
*/
	public function index() {
	   $this->layout = 'home';	 		
	   $this->admin_index();
	}


/**
/*
a
/**
 * admin_lists method
 *
 * @return void
 */
	public function admin_lists() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$testimonials = $this->Testimonial->find('list', $options);
		$this->set('testimonials', $testimonials);
		$this->set('_serialize', array('testimonials'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$conditions = array('Testimonial.' . $this->Testimonial->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('testimonial', $this->Testimonial->find('first', $options));
        $this->set('_serialize', array('testimonial'));
	}

/**
 * admin_testimonail_method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_testimonial_message($id = null) {
		$this->admin_view($id);
	}

	public function show_testimonials(){
		$id = $this->request->data['id'];

		$testimonial = $this->Testimonial->find('first',['conditions'=>['Testimonial.id'=>$id]]);


		/*Set Compact*/

		$this->set(compact('testimonial'));
	}


/**
 * admin_add method
 *
 * @return void
 */
public function admin_add() {

		//debug($this->request->params);die;

		$journeyId = (isset($this->request->params['pass'][0])) ? $this->request->params['pass'][0] : '';
		//debug($journeyId);die;

		if ($this->request->is(array('post', 'put'))) {
					
			//debug($this->request->data);die;
			if ($this->Testimonial->save($this->request->data)) {
				$this->flash = array('message'=>'The testimonial has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The testimonial could not be saved. Please, try again.', 'class'=>'danger');
			}
		}

		$this->set(compact('journeyId'));
	}

/**
*/
	public function add() {
	   $this->admin_add();
	}
/**

/**	
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('enableAjax', false);
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testimonial->save($this->request->data)) {
				$this->flash = array('message'=>__('The testimonial has been saved'), 'class'=>'success');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->flash = array('message'=>__('The testimonial could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Testimonial.' . $this->Testimonial->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Testimonial->find('first', $options);
		}
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

	$testimonialid = trim($this->request->data['testimonialid']);

	// debug($serviceId);exit;

	 if (!empty($testimonialid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Testimonial->id = $testimonialid;
       	 if ($this->Testimonial->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

	/*For Display Review */
public function admin_is_display_homepage(){
	$this->autoRender = false;

	$testimonialid = trim($this->request->data['testimonialid']);

	// debug($serviceId);exit;

	 if (!empty($testimonialid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Testimonial->id = $testimonialid;
       	 if ($this->Testimonial->saveField('is_display_homepage',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

}