<?php
App::uses('AppController', 'Controller');
/**
 * BookingFacilities Controller
 *
 * @property BookingFacility $BookingFacility
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BookingFacilitiesController extends AppController {

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

	$bookingid = trim($this->request->data['bookingid']);

	// debug($serviceId);exit;

	 if (!empty($bookingid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->BookingFacility->id = $bookingid;
       	 if ($this->BookingFacility->saveField('active',$value)) {
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
		$this->BookingFacility->recursive = 0;
		$this->paginate = $options;
		$this->set('bookingFacilities', $this->paginate('BookingFacility'));
		$this->set('_serialize', array('bookingFacilities'));
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
		
		$bookingFacilities = $this->BookingFacility->find('list', $options);
		$this->set('bookingFacilities', $bookingFacilities);
		$this->set('_serialize', array('bookingFacilities'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BookingFacility->exists($id)) {
			throw new NotFoundException(__('Invalid booking facility'));
		}
		$conditions = array('BookingFacility.' . $this->BookingFacility->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('bookingFacility', $this->BookingFacility->find('first', $options));
        $this->set('_serialize', array('bookingFacility'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BookingFacility->create();
			if ($this->BookingFacility->save($this->request->data)) {
				$this->flash = array('message'=>'The booking facility has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The booking facility could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->BookingFacility->exists($id)) {
			throw new NotFoundException(__('Invalid booking facility'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BookingFacility->save($this->request->data)) {
				$this->flash = array('message'=>__('The booking facility has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The booking facility could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('BookingFacility.' . $this->BookingFacility->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->BookingFacility->find('first', $options);
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
