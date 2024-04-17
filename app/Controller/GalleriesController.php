<?php
App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class GalleriesController extends AppController {

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
$this->Auth->allow('index','view','add');
}

/**
/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$galleryid = trim($this->request->data['galleryid']);

	// debug($serviceId);exit;

	 if (!empty($galleryid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Gallery->id = $galleryid;
       	 if ($this->Gallery->saveField('active',$value)) {
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
		$options['contain']=['GalleryCategory'];
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->Gallery->recursive = 0;
		$this->paginate = $options;
		$this->set('galleries', $this->paginate('Gallery'));
		$this->set('_serialize', array('galleries'));
	}

/*For Fron-end Page*/
public function index(){
	$this->layout = 'home';

	$galleryCategories = $this->Gallery->GalleryCategory->find('all',['conditions'=>['GalleryCategory.active'=>'true'],'contain'=>false,'order'=>['GalleryCategory.id'=>'ASC']]);



	$this->set(compact('galleryCategories'));

}	

/*For Fron-end Page*/
public function view(){
	$this->layout = 'home';
	//debug($this->request->params);die;

	$gallerySlug = (isset($this->request->params['gallery_slug'])) ? $this->request->params['gallery_slug'] : '';

	$galleryCategory = $this->Gallery->GalleryCategory->find('first',['conditions'=>['GalleryCategory.page_slug'=>$gallerySlug],'contain'=>false,'fields'=>['id','name']]);

	$id = $galleryCategory['GalleryCategory']['id'];

	$galleries = $this->Gallery->find('all',['conditions'=>['Gallery.gallery_category_id'=>$id,'Gallery.active'=>true]]);	

	$othergalleries = $this->Gallery->GalleryCategory->find('all', [
	    'conditions' => [
	        'NOT' => ['GalleryCategory.id' => $id],
	        'GalleryCategory.active' => true
	    ]
	]);

	// debug($galleryCatId);die;

	$this->set(compact('galleries','othergalleries','galleryCategory'));

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
		
		$galleries = $this->Gallery->find('list', $options);
		$this->set('galleries', $galleries);
		$this->set('_serialize', array('galleries'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$conditions = array('Gallery.' . $this->Gallery->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('gallery', $this->Gallery->find('first', $options));
        $this->set('_serialize', array('gallery'));
	}

/**
 * admin_add method
 *
 * @return void
 */
 public function admin_add() {
	if ($this->request->is('post')) {
		$this->Gallery->create();
		debug($this->request->data);exit;
		if ($this->Gallery->save($this->request->data)) {
			$this->flash = array('message'=>'The gallery has been saved', 'class'=>'success');
			$this->redirect = true;
		} else {
			$this->flash = array('message'=>'The gallery could not be saved. Please, try again.', 'class'=>'danger');
		}
	}
	$galleryCategories = $this->Gallery->GalleryCategory->find('list');
	$this->set(compact('galleryCategories'));
}

/*For Add Image From Front-end*/
public function add(){

	$categoryIds = $this->request->params['named']['gallery_category_id'];
	// debug($categoryIds);exit;


	$uploadImages = [];
	if ($this->request->is('post')) {
	
		// debug($this->request->data);exit;
		

		foreach ($this->request->data['Gallery']['image'] as $key => $image) {
			// debug($image);
			$uploadImages['Gallery'][$key]['gallery_category_id'] = $categoryIds;
			$uploadImages['Gallery'][$key]['image'] = $image;


		}
		$uploadImages['GalleryCategory']['id'] = $categoryIds;
		// debug($uploadImages); exit;

		if ($this->Gallery->GalleryCategory->saveAll($uploadImages,['deep'=>true])) {
			$this->flash = array('message'=>'The gallery has been saved', 'class'=>'success');
			$this->redirect = true;
		} else {
			$this->flash = array('message'=>'The gallery could not be saved. Please, try again.', 'class'=>'danger');
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
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gallery->save($this->request->data)) {
				$this->flash = array('message'=>__('The gallery has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The gallery could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Gallery.' . $this->Gallery->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Gallery->find('first', $options);
		}
		$galleryCategories = $this->Gallery->GalleryCategory->find('list');
		$this->set(compact('galleryCategories'));
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
