<?php
App::uses('AppController', 'Controller');
/**
 * MenuLinks Controller
 *
 * @property MenuLink $MenuLink
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MenuLinksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/*
* beforeFilter method
*/
 	function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', false);
//		$this->Auth->allow();
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = $option1 = array();
		$conditions = $conditions1 = array();
		
		$rolesVale = $roleConditions =  ''; 
		if(isset($this->request->params['named']['Role.id'])) {
			$rolesVale = $this->request->params['named']['Role.id'];
			$roleMenulinks = $this->MenuLink->MenuLinksRole->find('list',['conditions'=>['MenuLinksRole.role_id'=>$rolesVale],'fields'=>['id','menu_link_id']]);

			// debug($roleMenulinks);exit;

			$roleMenulinks = array_filter(array_unique($roleMenulinks));
			$menulinkIds = implode(',', $roleMenulinks);
			if(empty($menulinkIds)) { $menulinkIds = 0;}

			// debug($menulinkIds);exit;

			$roleConditions = "AND MenuLink.id IN (".$menulinkIds.")";
			
			unset($this->request->params['named']['Role.id']);

		}

		// debug($roleConditions);exit;

		$conditions = ['MenuLink.title Is NOT NUll'.' '.$roleConditions]; 
		// debug($conditions);exit;
		$conditions1 = $options['conditions'] = $this->Hetu->named_index($conditions);
		$option1 = $options['contain'] = array('Menu'=>array('id', 'name'), 'ParentMenuLink', 'Role.name');
		
		$this->MenuLink->recursive = 0;
		$this->paginate = $options;
		$this->set('menuLinks', $this->paginate('MenuLink'));
		$this->set('_serialize', array('menuLinks'));

		$menulinksData = $this->MenuLink->find('all',$option1);

		// debug($menulinksData);exit;

		/*Menu Lisiting*/
		$menus = $this->MenuLink->Menu->find('list');

		/*Menu Value*/
		$menuValue = (isset($this->request->params['named']['MenuLink.menu_id'])) ? $this->request->params['named']['MenuLink.menu_id'] : '';

		$parentlinkArr = $menulinktitleArr =  [];
		foreach ($menulinksData as $key => $value) { 	
			$parentlinkArr [$value['ParentMenuLink']['id']] = $value['ParentMenuLink']['title']; 	
			$menulinktitleArr [$value['MenuLink']['id']] = $value['MenuLink']['title']; 	
		}	

		/*Parent Link Value*/
		$parentlinkArr = array_filter(array_unique($parentlinkArr));
		$parentlinkValue = (isset($this->request->params['named']['MenuLink.parent_id'])) ? $this->request->params['named']['MenuLink.parent_id'] : '';

		/*Menu Title*/
		$menulinktitleArr = array_filter(array_unique($menulinktitleArr));
		$menulinltitleValue = (isset($this->request->params['named']['MenuLink.id'])) ? $this->request->params['named']['MenuLink.id'] : '';

		/*roles*/
		$roles = $this->MenuLink->Role->find('list');
		if(!empty($rolesVale)){
			$this->request->params['named']['Role.id'] = $rolesVale; 	
		}

		/*activeLinks*/
		$activelinks = (isset($this->request->params['named']['MenuLink.active'])) ? $this->request->params['named']['MenuLink.active'] : '';

		$this->set(compact('menus','menuValue','parentlinkArr','parentlinkValue','menulinktitleArr','menulinltitleValue','roles','rolesVale','activelinks'));
	}

/**
 * admin_lists method
 *
 * @return void
 */
	public function admin_lists() {
		$options = array();
		$conditions = array();
		$conditions = $this->Hetu->named_index($conditions);
//		debug($conditions);exit;
		$menuLinks = $this->MenuLink->generateTreeList($conditions, null, null, '-- ');
//		debug($menuLinks);exit;
		$this->set('menuLinks', $menuLinks);
		$this->set('_serialize', array('menuLinks'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MenuLink->exists($id)) {
			throw new NotFoundException(__('Invalid menu link'));
		}
		$conditions = array('MenuLink.' . $this->MenuLink->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('menuLink', $this->MenuLink->find('first', $options));
        $this->set('_serialize', array('menuLink'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MenuLink->create();
			if ($this->MenuLink->save($this->request->data)) {
				$this->flash = array('message'=>'The menu link has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The menu link could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$menus = $this->MenuLink->Menu->find('list');
		$parentMenuLinks = $this->MenuLink->ParentMenuLink->generateTreeList(null, null, null, '-- ');
		$roles = $this->MenuLink->Role->find('list');
		$users = $this->MenuLink->User->find('all' ,['contain' =>false]);
		$users = Hash::combine($users, '{n}.User.id', '{n}.User.name');
		$this->set(compact('parentMenuLinks', 'menus', 'roles', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MenuLink->exists($id)) {
			throw new NotFoundException(__('Invalid menu link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MenuLink->save($this->request->data)) {
				$this->flash = array('message'=>__('The menu link has been saved'), 'class'=>'success');
                
                $redirect = am(['action'=>'index'], $this->request->params['named']);
				$this->redirect = $redirect;
			} else {
				$this->flash = array('message'=>__('The menu link could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('MenuLink.' . $this->MenuLink->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->MenuLink->find('first', $options);
		}
		
		$parentMenuLinks = $this->MenuLink->ParentMenuLink->generateTreeList(array('menu_id'=>$this->request->data('MenuLink.menu_id')), null, null, '-- ');
		
		$menus = $this->MenuLink->Menu->find('list');
		
		$roles = $this->MenuLink->Role->find('list');
		
		$users = $this->MenuLink->User->find('all' ,['contain' =>false]);
		$users = Hash::combine($users, '{n}.User.id', '{n}.User.name');

		// debug($parentMenuLinks);exit;

		$this->set(compact('parentMenuLinks', 'menus', 'roles', 'users'));
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
	
/**
 * get_controllers method
 *
 * @return void
 */
	public function admin_get_controllers() {
		$controllersListHumanize = array();
		$controllersList = str_replace('Controller', '', App::objects('Controller'));
		foreach($controllersList as $k=>$value) {
			if($value == 'App') continue;
			
			$valueTableize = Inflector::tableize($value);
			$controllersListHumanize[$valueTableize] = Inflector::humanize($valueTableize);
		}
        if (!empty($this->request->params['requested'])) {
            return $controllersListHumanize;
        }
		$this->set('controllers', $controllersListHumanize);
		$this->set('_serialize', array('controllers'));
	}
	
/**
 * get_controller_actions method
 *
 * @return void
 */
	public function admin_get_controller_actions($controller) {
		$controller = Inflector::classify($controller.'_controller');
		
		// Load the controller
		App::import('Controller', str_replace('Controller', '', $controller));

		// Load its methods / actions
		$aMethods = get_class_methods($controller);

		foreach ($aMethods as $idx => $method) {

			if ($method[0] == '_') {
				unset($aMethods[$idx]);
			}
		}
		
		// Load the ApplicationController (if there is one)
		App::import('Controller', 'AppController');
		$parentActions = get_class_methods('AppController');

		$actions = array_diff($aMethods, $parentActions);
		$actions = array_combine($actions, $actions);
		
        if (!empty($this->request->params['requested'])) {
            return $actions;
        }
        
		$this->set('actions', $actions);
		$this->set('_serialize', array('actions'));
	}

/**
 * movedown method
 *
 * @return void
 */
	public function admin_movedown($id = null, $delta = null) {
		$this->MenuLink->id = $id;
		if (!$this->MenuLink->exists()) {
		   throw new NotFoundException(__('Invalid MenuLink'));
		}
	
		if ($delta > 0) {
			$this->MenuLink->moveDown($this->MenuLink->id, abs($delta));
            $this->MenuLink->clearOrgCache();
            $this->flash = array('message'=>__("Menu has been shifted {$delta} position down"), 'class'=>'success');
		} else {
			$this->Session->setFlash(array('message'=>__('Please provide the number of positions the field should be moved down.'), 'class'=>'danger'));
		}
	
		return $this->redirect($this->referer());
	}	
	
/**
 * moveup method
 *
 * @return void
 */
 	public function admin_moveup($id = null, $delta = null) {
		$this->MenuLink->id = $id;
		if (!$this->MenuLink->exists()) {
		   throw new NotFoundException(__('Invalid menu link'));
		}
		
		// debug($delta);exit;

		if ($delta > 0) {
			$this->MenuLink->moveUp($this->MenuLink->id, abs($delta));
            $this->MenuLink->clearOrgCache();
            $this->flash = array('message'=>__("Menu has been shifted {$delta} position up"), 'class'=>'success');
		} else {
			$this->Session->setFlash(array('message'=>__('Please provide the number of positions the field should be moved up.'), 'class'=>'danger'));
		}
        
		return $this->redirect($this->referer());
	}

/**
 * admin_recover method
 *
 * @return void
 */
 	public function admin_recover($id = null, $delta = null) {
        $this->MenuLink->recover('tree');
	
		return $this->redirect(array('action' => 'index'));
    }

/**
 * admin_verify method
 *
 * @return void
 */
 	public function admin_verify() {
		Configure::write('debug', 2);
        debug($this->MenuLink->verify());
        exit;
    }

	public function admin_activeinactive($value, $id = []) {
		$data['MenuLink.id'] = explode(',', $id);
		$this->MenuLink->updateAll(
			array('MenuLink.active' => $value),
			array($data)
			);
		$name = $value == '1' ? 'Activated' : 'InActivated';
		$this->flash = array('message'=>'Selected Menu Link '.$name, 'class'=>'success');	
		$this->redirect = $this->referer();
	}

/*Menu Link Is Active Ajax*/
public function admin_is_active(){
	$this->autoRender = false;
	$menuLinkid = trim($this->request->data['menuLinkid']);
	 if (!empty($menuLinkid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->MenuLink->id = $menuLinkid;
       	 if ($this->MenuLink->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
	}


}
