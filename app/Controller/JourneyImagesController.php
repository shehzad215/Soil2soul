<?php
App::uses('AppController', 'Controller');
/**
 * JourneyImages Controller
 *
 * @property JourneyImage $JourneyImage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class JourneyImagesController extends AppController {

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

/**
/*For Updating its Main Image*/
 public function admin_update_main_image(){
	$this->autoRender = false;

 	$id = $this->request->data['journeyimageid'];
 	$journyId = $this->request->data['journeyid'];
 	$checked = $this->request->data['checkedid'];

 	$value= ($checked == "true") ? 1 : 0;

 	if($value == 1){
 		$this->JourneyImage->updateAll(["JourneyImage.its_main_image"=>0],['JourneyImage.id !=' => $journyId,'JourneyImage.our_journy_id'=>$journyId]);
 		 $this->JourneyImage->id = $id;
    	 $this->JourneyImage->saveField('its_main_image', $value);
 	}else{

 		 $this->JourneyImage->id = $id;
    	 $this->JourneyImage->saveField('its_main_image', $value);
 	}

	// //debug($mainImageId);die;
	// if(!empty($mainImageId)){
	// 	 $this->JourneyImage->updateAll(
    //             array('JourneyImage.its_main_image' => 0),
    //             array('JourneyImage.id !=' => $mainImageId)
    //         );
    //        // Set its_main_image to 1 for the specified ID
    //         $this->JourneyImage->id = $mainImageId;
    //         $this->JourneyImage->saveField('its_main_image', 1);
	// }

}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($journeyId) {
		
		$options = array();
		$conditions = array();
		$options['contain']=['OurJourny'];
		$conditions = ['JourneyImage.our_journy_id'=>$journeyId];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->JourneyImage->recursive = 0;
		$this->paginate = $options;
		$this->set('journeyImages', $this->paginate('JourneyImage'));
		$this->set('_serialize', array('journeyImages'));
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
		
		$journeyImages = $this->JourneyImage->find('list', $options);
		$this->set('journeyImages', $journeyImages);
		$this->set('_serialize', array('journeyImages'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->JourneyImage->exists($id)) {
			throw new NotFoundException(__('Invalid journey image'));
		}
		$conditions = array('JourneyImage.' . $this->JourneyImage->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('journeyImage', $this->JourneyImage->find('first', $options));
        $this->set('_serialize', array('journeyImage'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($journeyId) {
		$this->set('enableAjax',true);	
		$journeyImages = $this->JourneyImage->find('all',['contain'=>false]);	
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['OurJourny']['id'] = $journeyId;

			// debug($this->request->data);exit;

			if ($this->JourneyImage->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The journey image has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The journey image could not be saved. Please, try again.', 'class'=>'danger');
			}
		}else {
			$conditions = array('OurJourny.id' => $journeyId);
			$options['conditions'] = $conditions;
			$this->request->data = $this->JourneyImage->OurJourny->find('first', $options);
		}
		
		$ourJournies = $this->JourneyImage->OurJourny->find('list');
		$this->set(compact('ourJournies','journeyId','journeyImages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->JourneyImage->exists($id)) {
			throw new NotFoundException(__('Invalid journey image'));
		}
		if ($this->request->is(array('post', 'put'))) {

			// debug($this->request->data);
			
			$journyId = $this->request->data['JourneyImage']['our_journy_id'];

			// debug($journyId);exit;

			$journeyImageDetails = $this->JourneyImage->find('first',['conditions'=>['JourneyImage.our_journy_id'=>$journyId,'JourneyImage.active'=>true,'JourneyImage.its_main_image'=>true,'JourneyImage.id !='=>$id],'contain'=>false]);


			if(!empty($journeyImageDetails)){
				$updateImageArr = [];

				$updateImageArr['JourneyImage']['id'] = $journeyImageDetails['JourneyImage']['id']; 
				$updateImageArr['JourneyImage']['its_main_image'] = false;

				// debug($updateImageArr);exit;
				$this->JourneyImage->save($updateImageArr);
			}
			// debug($journeyImageDetails);exit;


			if ($this->JourneyImage->save($this->request->data)) {
				$this->flash = array('message'=>__('The journey image has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The journey image could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('JourneyImage.' . $this->JourneyImage->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->JourneyImage->find('first', $options);
		}
		$ourJournies = $this->JourneyImage->OurJourny->find('list');
		$this->set(compact('ourJournies'));
	}


/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;
	$ImageId = trim($this->request->data['imageId']);
	 if (!empty($ImageId)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->JourneyImage->id = $ImageId;
       	 if ($this->JourneyImage->saveField('active',$value)) {
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
