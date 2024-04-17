<?php
App::uses('AppController', 'Controller');
/**
 * OurPartners Controller
 *
 * @property OurPartner $OurPartner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurPartnersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/*
* beforeFilter method
*/


/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$partnerid = trim($this->request->data['partnerid']);

	// debug($serviceId);exit;

	 if (!empty($partnerid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurPartner->id = $partnerid;
       	 if ($this->OurPartner->saveField('active',$value)) {
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
		$options['contain']=false;
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->OurPartner->recursive = 0;
		$this->paginate = $options;
		$this->set('ourPartners', $this->paginate('OurPartner'));
		$this->set('_serialize', array('ourPartners'));
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
		
		$ourPartners = $this->OurPartner->find('list', $options);
		$this->set('ourPartners', $ourPartners);
		$this->set('_serialize', array('ourPartners'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurPartner->exists($id)) {
			throw new NotFoundException(__('Invalid our partner'));
		}
		$conditions = array('OurPartner.' . $this->OurPartner->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourPartner', $this->OurPartner->find('first', $options));
        $this->set('_serialize', array('ourPartner'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OurPartner->create();
			if ($this->OurPartner->save($this->request->data)) {
				$this->flash = array('message'=>'The our partner has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our partner could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->OurPartner->exists($id)) {
			throw new NotFoundException(__('Invalid our partner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurPartner->save($this->request->data)) {
				$this->flash = array('message'=>__('The our partner has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our partner could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurPartner.' . $this->OurPartner->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurPartner->find('first', $options);
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
	}}
