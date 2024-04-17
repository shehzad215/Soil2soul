<?php
App::uses('AppController', 'Controller');
/**
 * SeoModules Controller
 *
 * @property SeoModule $SeoModule
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SeoModulesController extends AppController {

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
		$options['contain'] = false;
		$this->SeoModule->recursive = 0;
		$this->paginate = $options;
		$this->set('seoModules', $this->paginate('SeoModule'));
		$this->set('_serialize', array('seoModules'));
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
		
		$seoModules = $this->SeoModule->find('list', $options);
		$this->set('seoModules', $seoModules);
		$this->set('_serialize', array('seoModules'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SeoModule->exists($id)) {
			throw new NotFoundException(__('Invalid seo module'));
		}
		$conditions = array('SeoModule.' . $this->SeoModule->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('seoModule', $this->SeoModule->find('first', $options));
        $this->set('_serialize', array('seoModule'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->SeoModule->create();
			if ($this->SeoModule->save($this->request->data)) {
				$this->flash = array('message'=>'The seo module has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The seo module could not be saved. Please, try again.', 'class'=>'danger');
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
		$this->set('enableAjax',false);
		if (!$this->SeoModule->exists($id)) {
			throw new NotFoundException(__('Invalid seo module'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SeoModule->save($this->request->data)) {
				$this->flash = array('message'=>__('The seo module has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The seo module could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('SeoModule.' . $this->SeoModule->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->SeoModule->find('first', $options);
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
