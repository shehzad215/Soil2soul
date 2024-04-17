<?php
App::uses('AppController', 'Controller');
/**
 * SocialMedia Controller
 *
 * @property SocialMedia $SocialMedia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SocialMediaController extends AppController {

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

	$socialid = trim($this->request->data['socialid']);

	// debug($serviceId);exit;

	 if (!empty($socialid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->SocialMedia->id = $socialid;
       	 if ($this->SocialMedia->saveField('active',$value)) {
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
		
		$this->SocialMedia->recursive = 0;
		$this->paginate = $options;
		$this->set('socialMedia', $this->paginate('SocialMedia'));
		$this->set('_serialize', array('socialMedia'));
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
		
		$socialMedia = $this->SocialMedia->find('list', $options);
		$this->set('socialMedia', $socialMedia);
		$this->set('_serialize', array('socialMedia'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SocialMedia->exists($id)) {
			throw new NotFoundException(__('Invalid social media'));
		}
		$conditions = array('SocialMedia.' . $this->SocialMedia->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('socialMedia', $this->SocialMedia->find('first', $options));
        $this->set('_serialize', array('socialMedia'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SocialMedia->create();
			if ($this->SocialMedia->save($this->request->data)) {
				$this->flash = array('message'=>'The social media has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The social media could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->SocialMedia->exists($id)) {
			throw new NotFoundException(__('Invalid social media'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SocialMedia->save($this->request->data)) {
				$this->flash = array('message'=>__('The social media has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The social media could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('SocialMedia.' . $this->SocialMedia->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->SocialMedia->find('first', $options);
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
