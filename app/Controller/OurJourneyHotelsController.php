<?php
App::uses('AppController', 'Controller');
/**
 * OurJourneyHotels Controller
 *
 * @property OurJourneyHotel $OurJourneyHotel
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurJourneyHotelsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

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
		$options['contain']=['OurJourny'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->OurJourneyHotel->recursive = 0;
		$this->paginate = $options;
		$this->set('ourJourneyHotels', $this->paginate('OurJourneyHotel'));
		$this->set('_serialize', array('ourJourneyHotels'));
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
		
		$ourJourneyHotels = $this->OurJourneyHotel->find('list', $options);
		$this->set('ourJourneyHotels', $ourJourneyHotels);
		$this->set('_serialize', array('ourJourneyHotels'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurJourneyHotel->exists($id)) {
			throw new NotFoundException(__('Invalid our journey hotel'));
		}
		$conditions = array('OurJourneyHotel.' . $this->OurJourneyHotel->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourJourneyHotel', $this->OurJourneyHotel->find('first', $options));
        $this->set('_serialize', array('ourJourneyHotel'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {
		$this->set('enableAjax',false);
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['OurJourny']['id'] = $journeyId;
			if ($this->OurJourneyHotel->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The our journey hotel has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The our journey hotel could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else{
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyHotel->OurJourny->find('first', $options);
		}
		$ourJournies = $this->OurJourneyHotel->OurJourny->find('list');
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
		if (!$this->OurJourneyHotel->exists($id)) {
			throw new NotFoundException(__('Invalid our journey hotel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurJourneyHotel->save($this->request->data)) {
				$this->flash = array('message'=>__('The our journey hotel has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our journey hotel could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurJourneyHotel.' . $this->OurJourneyHotel->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourneyHotel->find('first', $options);
		}
		$ourJournies = $this->OurJourneyHotel->OurJourny->find('list');
		$this->set(compact('ourJournies'));
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

	$hotelid = trim($this->request->data['hotelid']);

	// debug($serviceId);exit;

	 if (!empty($hotelid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurJourneyHotel->id = $hotelid;
       	 if ($this->OurJourneyHotel->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

}
