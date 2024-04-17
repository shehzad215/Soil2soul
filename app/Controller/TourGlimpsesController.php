<?php
App::uses('AppController', 'Controller');
/**
 * TourGlimpses Controller
 *
 * @property TourGlimpse $TourGlimpse
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TourGlimpsesController extends AppController {

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
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = ['OurJourny','Amenity'];
		$this->TourGlimpse->recursive = 0;
		$this->paginate = $options;
		$this->set('tourGlimpses', $this->paginate('TourGlimpse'));
		$this->set('_serialize', array('tourGlimpses'));

		$journeyId = isset($this->request->params['named']['TourGlimpse.our_journy_id']) ? $this->request->params['named']['TourGlimpse.our_journy_id'] : '';


		$ourJournies = (!empty($journeyId)) ? $this->TourGlimpse->OurJourny->find('list',['conditions'=>['OurJourny.id'=>$journeyId]]) : '';
		/*Set Compact*/
		$this->set(compact('journeyId','ourJournies'));

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
		
		$tourGlimpses = $this->TourGlimpse->find('list', $options);
		$this->set('tourGlimpses', $tourGlimpses);
		$this->set('_serialize', array('tourGlimpses'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TourGlimpse->exists($id)) {
			throw new NotFoundException(__('Invalid tour glimpse'));
		}
		$conditions = array('TourGlimpse.' . $this->TourGlimpse->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('tourGlimpse', $this->TourGlimpse->find('first', $options));
        $this->set('_serialize', array('tourGlimpse'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		$journeyId = isset($this->request->params['named']['TourGlimpse.our_journy_id']) ? $this->request->params['named']['TourGlimpse.our_journy_id'] : '';

		// debug($journeyId);exit;

		if ($this->request->is(array('post'))) {
			if ($this->TourGlimpse->save($this->request->data))  {
				$this->flash = array('message'=>'The tour glimpse has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index','TourGlimpse.our_journy_id'=>$journeyId];
			} else {
				$this->flash = array('message'=>'The tour glimpse could not be saved. Please, try again.', 'class'=>'danger');
			}
		}

		$ourJournies = $this->TourGlimpse->OurJourny->find('list');
		$amenities = $this->TourGlimpse->Amenity->find('list',['conditions'=>['Amenity.active'=>true]]);
		$this->set(compact('ourJournies', 'amenities','journeyId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('enableAjax',false);
		
		$tourGlimpse = $this->TourGlimpse->find('first',['conditions'=>['TourGlimpse.id'=>$id],'contain'=>false]);
		$journeyId = $tourGlimpse['TourGlimpse']['our_journy_id']; 
		// debug($tourGlimpse);exit;	

		if (!$this->TourGlimpse->exists($id)) {
			throw new NotFoundException(__('Invalid tour glimpse'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TourGlimpse->save($this->request->data)) {
				$this->flash = array('message'=>__('The tour glimpse has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index','TourGlimpse.our_journy_id'=>$journeyId];
			} else {
				$this->flash = array('message'=>__('The tour glimpse could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('TourGlimpse.' . $this->TourGlimpse->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->TourGlimpse->find('first', $options);
		}
		
		$ourJournies = $this->TourGlimpse->OurJourny->find('list',['conditions'=>['OurJourny.id'=>$journeyId]]);
		$amenities = $this->TourGlimpse->Amenity->find('list',['conditions'=>['Amenity.active'=>true]]);

		$this->set(compact('ourJournies', 'amenities','journeyId'));
	}

/**

	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$glimseid = trim($this->request->data['glimseid']);

	// debug($serviceId);exit;

	 if (!empty($glimseid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->TourGlimpse->id = $glimseid;
       	 if ($this->TourGlimpse->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
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
