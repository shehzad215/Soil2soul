<?php
App::uses('AppController', 'Controller');
/**
 * GalleryCategories Controller
 *
 * @property GalleryCategory $GalleryCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class GalleryCategoriesController extends AppController {

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

	$galcatid = trim($this->request->data['galcatid']);

	// debug($serviceId);exit;

	 if (!empty($galcatid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->GalleryCategory->id = $galcatid;
       	 if ($this->GalleryCategory->saveField('active',$value)) {
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
		$options['contain']=['Gallery'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->GalleryCategory->recursive = 0;
		$this->paginate = $options;
		$this->set('galleryCategories', $this->paginate('GalleryCategory'));
		$this->set('_serialize', array('galleryCategories'));
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
		
		$galleryCategories = $this->GalleryCategory->find('list', $options);
		$this->set('galleryCategories', $galleryCategories);
		$this->set('_serialize', array('galleryCategories'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->GalleryCategory->exists($id)) {
			throw new NotFoundException(__('Invalid gallery category'));
		}
		$conditions = array('GalleryCategory.' . $this->GalleryCategory->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('galleryCategory', $this->GalleryCategory->find('first', $options));
        $this->set('_serialize', array('galleryCategory'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->GalleryCategory->create();
			if ($this->GalleryCategory->save($this->request->data)) {
				$this->flash = array('message'=>'The gallery category has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The gallery category could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$gallerycat = $this->GalleryCategory->find('first',['contain'=>false,'fields' => ['MAX(GalleryCategory.id)']]);
		$gallerycatid = $gallerycat['0']['MAX(`GalleryCategory`.`id`)'];
		$gallerycatid = (empty($gallerycatid)) ? 0 + 1 : $gallerycatid + 1;
		$this->set(compact('gallerycat','gallerycatid'));
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
		if (!$this->GalleryCategory->exists($id)) {
			throw new NotFoundException(__('Invalid gallery category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GalleryCategory->save($this->request->data)) {
				$this->flash = array('message'=>__('The gallery category has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The gallery category could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('GalleryCategory.' . $this->GalleryCategory->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->GalleryCategory->find('first', $options);
		}
		$gallerycat = $this->GalleryCategory->find('first',['contain'=>false,'fields' => ['MAX(GalleryCategory.id)']]);
		$gallerycatid = $id;
		$this->set(compact('gallerycat','gallerycatid'));
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
