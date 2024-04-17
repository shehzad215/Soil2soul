<?php
App::uses('AppController', 'Controller');
/**
 * Amenities Controller
 *
 * @property Amenity $Amenity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AmenitiesController extends AppController {

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
	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$amenityid = trim($this->request->data['amenityid']);

	// debug($serviceId);exit;

	 if (!empty($amenityid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Amenity->id = $amenityid;
       	 if ($this->Amenity->saveField('active',$value)) {
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
		
		$this->Amenity->recursive = 0;
		$this->paginate = $options;
		$this->set('amenities', $this->paginate('Amenity'));
		$this->set('_serialize', array('amenities'));
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
		
		$amenities = $this->Amenity->find('list', $options);
		$this->set('amenities', $amenities);
		$this->set('_serialize', array('amenities'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Amenity->exists($id)) {
			throw new NotFoundException(__('Invalid amenity'));
		}
		$conditions = array('Amenity.' . $this->Amenity->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('amenity', $this->Amenity->find('first', $options));
        $this->set('_serialize', array('amenity'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Amenity->create();
			if ($this->Amenity->save($this->request->data)) {
				$this->flash = array('message'=>'The amenity has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The amenity could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$ourJournies = $this->Amenity->OurJourny->find('list');
		$this->set(compact('ourJournies'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Amenity->exists($id)) {
			throw new NotFoundException(__('Invalid amenity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Amenity->save($this->request->data)) {
				$this->flash = array('message'=>__('The amenity has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The amenity could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Amenity.' . $this->Amenity->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Amenity->find('first', $options);
		}
		$ourJournies = $this->Amenity->OurJourny->find('list');
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
	}}
