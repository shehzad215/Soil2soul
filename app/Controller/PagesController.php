<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PagesController extends AppController {

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
$this->Auth->allow('our_journey','about_us','brand','whyspiritual','sanatanadharma','traveltips','testimonials');
}


public function our_journey(){
	$this->layout = 'home';
}


public function about_us(){
	$this->layout = 'home';
	$this->loadModel('OurPartner');

	$ourPartners = $this->OurPartner->find('all',['conditions'=>['OurPartner.active'=>true]]);

	$this->set(compact('ourPartners'));

	/*debug($ourPartners);die;*/	

}

public function brand(){
	$this->layout = 'home';
}

public function whyspiritual(){
	$this->layout = 'home';
}

public function sanatanadharma(){
	$this->layout = 'home';
}

public function traveltips(){
	$this->layout = 'home';
}

public function testimonials(){
	$this->layout = 'home';
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
		$this->Page->recursive = 0;
		$this->paginate = $options;
		$this->set('pages', $this->paginate('Page'));
		$this->set('_serialize', array('pages'));
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
		
		$pages = $this->Page->find('list', $options);
		$this->set('pages', $pages);
		$this->set('_serialize', array('pages'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$conditions = array('Page.' . $this->Page->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('page', $this->Page->find('first', $options));
        $this->set('_serialize', array('page'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->flash = array('message'=>'The page has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The page could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Page->save($this->request->data)) {
				$this->flash = array('message'=>__('The page has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The page could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Page.' . $this->Page->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Page->find('first', $options);
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

}
