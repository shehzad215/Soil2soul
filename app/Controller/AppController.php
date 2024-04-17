<?php
session_start();
App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $helpers = array('Session', 'Html', 'Form', 'Time', 'Text', 'Cache', 'Bs', 'Js', 'Number', 'AssetCompress.AssetCompress', 'PhpExcel.PhpExcel');

	public $components = array(
	'Hetu', 'Session', 'Cookie', 'RequestHandler','DebugKit.Toolbar', 'Auth', 'PhpExcel.PhpExcel', 'Zip',
	'GoogleCalendar.GoogleCalendar'=>array(
	        // 'id'=>'1031358123230-pn5ke5ip6t03n4rq4hl9430u5viarhv1.apps.googleusercontent.com',
	        // 'secret'=>'1fMxmiAZZ3XtbV3_D_JJEwDK'
			'id'=>'84859252385-dn5veom52gp6o9u0ij20220trf1h7vmj.apps.googleusercontent.com',
	        'secret'=>'sacred-alliance-195105'
	    )
	);

	public function beforeFilter() {
			parent::beforeFilter();
			$isMobile = $this->RequestHandler->isMobile();
			$this->set('enableAjax', true);
			// $this->Session->write('isLoggedIn',false);
			date_default_timezone_set('Asia/Kolkata');
			// Authentication using FormAuthenticate & BasicAuthenticate
			$this->Auth->allow('lists', 'isUnique', 'register_dimensions', 'updateimage');
			$prefix = (isset($this->request->params['prefix'])) ? $this->request->params['prefix'] : '';
			$roleDetail = $this->Auth->user(); 
		
			$locale = Configure::read('Config.language');
		    if ($locale && file_exists(APP . 'View' . DS . $locale . DS . $this->viewPath)) {
		        $this->viewPath = $locale . DS . $this->viewPath;
		    }
			if(empty($prefix)) {
				//Configure AuthComponent
				$this->Auth->authenticate = array(
					AuthComponent::ALL => ['scope'=>['User.active' => 1]],
					'Basic', 'Form'
				);
				$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin'=>true);
				$this->Auth->loginRedirect = array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true);
				$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin'=>true);
				$this->Auth->authError = __('Please login, or sign up to continue ahead.');
				$this->Auth->ajaxLogin = '../Users/admin_login';
			}elseif($prefix == 'admin') {
				$this->layout = 'admin';
				$this->Auth->authenticate = array(
					AuthComponent::ALL => ['scope'=>['User.active' => 1]],
					'Basic', 'Form'
				);
				$this->Auth->ajaxLogin = '../Users/admin_login';
				$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin'=>true);
				$this->Auth->loginRedirect = array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true);
				$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin'=>true);
			}
			
			/*Prefix Login End*/	
			if($this->Auth->loggedIn()) {
				if($this->Auth->user('Timezone.value') != NULL) {
					Configure::write('Config.timezone', $this->Auth->user('Timezone.value'));
				}
			}

			// Set named data as form values
			if(
				in_array($this->request->params['action'], array('add', 'admin_add'))
				&&
				!empty($this->request->params['named'])
				&&
				!$this->request->is('post')
			) {
				$model = $this->request->params['model'];
				$namedParams = $this->request->params['named'];

	 			foreach ($namedParams as $key => $value) {
					if(!in_array($key, ['format', 'target'])) {
						if(count(explode('.', $key)) < 2) {
							$namedParams[$model.'.'.$key] = $value;
							unset($namedParams[$key]);
						}
					} else {
						unset($namedParams[$key]);
					}

				}
				$this->request->data = Hash::expand($namedParams);
			}

			// Load Menu
			$this->loadModel('MenuLink');
			$this->loadModel('MenuLinksUser');
			$this->loadModel('User');
			$this->loadModel('Package');
			$this->loadModel('OurJourny');
			$this->loadModel('SeoModule');
			$this->loadModel('Blog');
			$this->loadModel('BlogTag');
			$this->loadModel('BlogCategory');
			$this->loadModel('BlogAuthor');			
			$this->loadModel('OurTeam');	
			$this->loadModel('Testimonial');
			$this->loadModel('Video');
			$this->loadModel('VideoCategory');
			$this->loadModel('Gallery');
			$this->loadModel('Currency');


			/*$testimonials = $this->Testimonial->find('all',['conditions'=>['Testimonial.active'=>true,
				'Testimonial.is_display_homepage'=>true]]);*/

			$videos = $this->Video->find('all', ['conditions' => ['Video.active' => true,'Video.is_display_homepage' => true],'limit' => 3,'order'=>'rand()']);	

			//debug($videos);die;

			// $ourJournye = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false,'fields'=>['name','page_url']]);

			//debug($ourJournye);die;

			$crmRights = [];
			$menuLinksForHeaders = $menuLinksForFooters = $appMenuLinks = '';
			if(Hash::get($this->request->params, 'prefix') == 'admin') {
				$AssiendUser = $this->MenuLinksUser->find('list',['fields'=>'user_id']);
				$AssiendUser = array_filter(array_unique($AssiendUser));
				$AssiendUser = implode(',',$AssiendUser);
				if(empty($AssiendUser)){$AssiendUser = '0';}
				// For Admin Section
				$appMenuLinks = $this->MenuLink->find('threaded', array(
					'conditions' => array('MenuLink.menu_id' => 1, 'MenuLink.active'=>true),
					'contain'=>['User'=>['fields'=>['id'],'conditions'=>['User.id IN ('.$AssiendUser.')']]]
					));
	        	 $this->set(compact('appMenuLinks'));
				} else{
					// For Frontend Section
					$menuLinksForHeaders = $this->MenuLink->find('threaded', array(
						'conditions' => array('MenuLink.menu_id' => 2, 'MenuLink.active'=>true),
						'contain'=>false
						));

					$menuLinksForFooters = $this->MenuLink->find('threaded', array(
						'conditions' => array('MenuLink.menu_id' => 4, 'MenuLink.active'=>true),
						'contain'=>false
						));
				}


			/*URL*/
			$httpRequest = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
			$server = $_SERVER['HTTP_HOST']; 
			$url = $httpRequest.'://'.$_SERVER['HTTP_HOST'];

			if($server == 'localhost'){
			  $url = $httpRequest.'://'."$server/project/CakePHP/soil2soul";
			}

		
			/*Current Page URL*/
			$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];

			$pageSEO = [];
			/*Controller*/
			$controller = $this->request->params['controller'];
			$currentmodel = $this->request->params['model'];
			$currentaction = $this->request->params['action'];
			$passedPara = (isset($this->request->params['pass'])) ? $this->request->params['pass'] : '';	
			$blogSlug = (isset($this->request->params['blog_slug'])) ? $this->request->params['blog_slug'] : '';
			$categorSlug = (isset($this->request->params['blog_cat_slug'])) ? $this->request->params['blog_cat_slug'] : '';

			/*debug($this->request->params);die;*/

			$tagSlug = (isset($this->request->params['video_cat_slug'])) ? $this->request->params['video_cat_slug'] : '';
			
			//debug($this->request->params['blog_authur_slug']);die;
			$authorSlug = (isset($this->request->params['blog_authur_slug'])) ? $this->request->params['blog_authur_slug'] : '';

			$videocatSlug = (isset($this->request->params['blog_cat_slug'])) ? $this->request->params['blog_cat_slug'] : '';

			

			//debug($videotagSlug);die;

			$packageSlug = (isset($this->request->params['pacakage_slug'])) ? 
												$this->request->params['pacakage_slug'] : '';

			$journeySlug = (isset($this->request->params['page_slug'])) ? 
												$this->request->params['page_slug'] : '';

			$ourteamSlug = (isset($this->request->params['team_slug'])) ? 
												$this->request->params['team_slug'] : '';

			$gallerySlug = (isset($this->request->params['gallery_slug'])) ? 
												$this->request->params['gallery_slug'] : '';			
			/*Setup Page Wise Slug*/
			$slug = $seoModules = '';
			if(!empty($blogSlug)){
				$slug = $blogSlug;
			}elseif (!empty($categorSlug)) {
				$slug = $categorSlug;
			}elseif (!empty($tagSlug)) {
				$slug = $tagSlug;
			}elseif(!empty($authorSlug)){
				$slug = $authorSlug;
			}elseif(!empty($videocatSlug)){  
				$slug = $videocatSlug;
			}elseif(!empty($packageSlug)) {
				$slug = $packageSlug;
			}elseif(!empty($journeySlug)){
				$slug = $journeySlug;
			}elseif(!empty($ourteamSlug)){
				$slug = $ourteamSlug;
			}elseif(!empty($gallerySlug)){
				$slug = $gallerySlug;
			}

			/*debug($controller);exit;*/	

			$blogtags = '';
			/*Setup SEO Data*/
			if(!empty($slug)){
				switch ($controller) {
					case 'blogs':
					$seoModules = $this->Blog->find('first',['conditions'=>['Blog.page_slug'=>$slug],'contain'=>['BlogCategory','BlogTag']]);
					
					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['Blog']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/blog/main_image/'.$seoModules['Blog']['id'].'/'.$seoModules['Blog']['main_image'];
						$pageSEO ['PageSeo']['Category'] = $seoModules['BlogCategory']; 
						$pageSEO ['PageSeo']['BlogTag'] = $seoModules['BlogTag']; 
						break;
					}

					//debug($pageSEO);die;


					case 'blog_categories':
					$seoModules = $this->Blog->BlogCategory->find('first',['conditions'=>['BlogCategory.page_slug'=>$slug]]);
					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['BlogCategory']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/blog_category/image_file/'.$seoModules['BlogCategory']['id'].'/'.$seoModules['BlogCategory']['image_file'];
					}

					//debug($pageSEO);die;

					case 'blog_tags':
					$seoModules = $this->BlogTag->find('first',['conditions'=>['BlogTag.page_slug'=>$slug],'contain'=>['Blog']]);
					//debug($seoModules);die;
					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['BlogTag']; 
						//debug($pageSEO ['PageSeo']);die;		
					}

					case 'blog_authors':
					$seoModules = $this->BlogAuthor->find('first',['conditions'=>['BlogAuthor.page_slug'=>$slug],'contain'=>['Blog']]);
					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['BlogAuthor']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/blog_author/author_image/'.$seoModules['BlogAuthor']['id'].'/'.$seoModules['BlogAuthor']['author_image'];
					}

					case 'video_categories':
					$seoModules = $this->VideoCategory->find('first',['conditions'=>['VideoCategory.page_slug'=>$slug],'contain'=>['Video']]);

					//debug($seoModules);die;

					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['VideoCategory']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/video_category/image_file/'.$seoModules['VideoCategory']['id'].'/'.$seoModules['VideoCategory']['image_file'];
					}

					case 'packages':
						$seoModules = $this->Package->find('first',['conditions'=>['Package.page_slug'=>$slug],'contain'=>false]);

					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['Package']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/package/image_file/'.$seoModules['Package']['id'].'/'.$seoModules['Package']['image_file'];
						break;
					}

					case 'our_journies':
					$seoModules = $this->OurJourny->find('first',['conditions'=>['OurJourny.page_slug'=>$slug],'contain'=>false]);

					//debug($seoModules);die;

					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['OurJourny']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/our_journy/journey_banner/'.$seoModules['OurJourny']['id'].'/'.$seoModules['OurJourny']['journey_banner'];
						break;
					}

					case 'our_teams':
					$seoModules = $this->OurTeam->find('first',['conditions'=>['OurTeam.page_slug'=>$slug],'contain'=>false]);
					
					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['OurTeam']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/our_team/image_file/'.$seoModules['OurTeam']['id'].'/'.$seoModules['OurTeam']['image_file'];
						break;
					}

					case 'galleries':
					$seoModules = $this->Gallery->GalleryCategory->find('first',['conditions'=>['GalleryCategory.page_slug'=>$slug],'contain'=>false]);

					//debug($seoModules);die;

					if(!empty($seoModules)){
						$pageSEO ['PageSeo'] = $seoModules['GalleryCategory']; 
						$pageSEO ['PageSeo']['image_file'] = $url.'/files/gallery_category/image_file/'.$seoModules['GalleryCategory']['id'].'/'.$seoModules['GalleryCategory']['image_file'];
						break;
					}

					
				}
			}else{
				$seoModules = $this->SeoModule->find('all',['conditions'=>['SeoModule.controller'=>$controller,'SeoModule.action'=>$currentaction]]);

				/*Setup SEO Array*/
				if(!empty($seoModules)){
					foreach ($seoModules as $key => $seoModule) {
					 	$pageSEO ['PageSeo'] = $seoModule['SeoModule'];
					 	$pageSEO ['PageSeo']['image_file'] = (!empty($seoModule['SeoModule']['meta_image'])) ? $url.'/files/seo_module/meta_image/'.$seoModule['SeoModule']['id'].'/'.$seoModule['SeoModule']['meta_image'] : '';
					}
				}
			}

			$this->loadModel('Package');
			$packages = $this->Package->find('all',['conditions'=>['Package.active'=>true,'Package.display_on_homepage'=>true],'limit'=>'6','contain'=>false]);

			
			/*Default Currency*/
			$defaultCurrency = $this->Currency->find('first',['conditions'=>['Currency.id'=>67],'contain'=>false]); 

			$defaultCurCode = (!empty($this->Session->read('Currency.iso_code'))) ? $this->Session->read('Currency.iso_code') : $defaultCurrency['Currency']['iso_code'];

			$dCurSign =  (!empty($this->Session->read('Currency.sign'))) ? $this->Session->read('Currency.sign') : $defaultCurrency['Currency']['sign'];

			$currencies = $this->Currency->find('all',['conditions'=>['Currency.active'=>true],'contain'=>false]);

			
			// debug($pageSEO);exit;

	// blogtags
		 $this->set(compact('prefix', 'appMenuLinks','crmRights','isMobile','menuLinksForHeaders','menuLinksForFooters','controller','currentaction','url','link','pageSEO','packages','defaultCurrency','defaultCurCode','dCurSign','currencies','videos'));
	}


	public function afterFilter() {
		if(!in_array($this->request->params['action'], $this->Auth->allowedActions)){
			if ($this->request->is('ajax') && !$this->Auth->loggedIn()) {
				///$this->Auth->flash('Session Expired, Please login again to gain access.');
			}
		}
	}

	public function delete($id = null, $confirm = null) {

		 $model = $this->request->params['model'];
		 $modelName = Inflector::singularize(Inflector::humanize($this->request->params['controller']));

		if(is_int((int)$id)) {
			$this->{$model}->id = $id;
			if (!$this->{$model}->exists()) {
				$this->flash = array('message'=>'This '.$modelName.' is already deleted or doesn\'t exist', 'class'=>'info');
				$this->redirect = true;
			}
		}

		if(!$confirm) {
			$this->set(compact('id', 'model', 'modelName'));
			$this->render('/Elements/delete');
		} else {
			//$this->request->onlyAllow('post', 'delete');
			if(!is_numeric($id)) {
				$conditions[$model.'.id'] = explode(',', $id);
				$this->{$model}->deleteAll($conditions);
				$this->flash = array('message'=>''.Inflector::pluralize($modelName).' deleted', 'class'=>'success');
				$this->redirect = true;
			} else {
				if ($this->{$model}->delete()) {
					$this->flash = array('message'=>''.$modelName.' deleted', 'class'=>'success');
					$this->redirect = true;
				} else {
					$this->flash = array('message'=>''.$modelName.' was not deleted', 'class'=>'danger');
					$this->redirect = true;
				}
			}

		}
	}

	public function user_typeahead($field, $query = null) {
		$this->typeahead($field, $query = null);
	}

	public function delegate_typeahead($field, $query = null) {
		$this->typeahead($field, $query = null);
	}

	public function backoffice_typeahead($field, $query = null) {
		$this->typeahead($field, $query = null);
	}

	public function supplier_typeahead($field, $query = null) {
		$this->autoRender = false;
		$model = $this->params['model'];

		$op = array();

		if(strrpos($field, '.')) {
			list($model, $field) = explode('.', $field);
			$this->loadModel($model);
		}

		$conditions[$model.'.'.$field.' LIKE'] = '%'.$query.'%';
		$options['conditions'] = $conditions;
		$options['fields'] = array('DISTINCT '.$model.'.'.$field);
		$options['group'] = $model.'.'.$field;
		$options['recursive'] = 1;

		$results = $this->{$model}->find('all', $options);

		if(!empty($results)) {
			foreach($results as $result) {
				if(preg_match('/_date/', $field))
					$op['options'][] = date('', $result[$model][$field]);
				else
					$op['options'][] = $result[$model][$field];
			}
		}
		echo json_encode($op);
	}

	public function typeahead($field, $query = null) {
		$this->autoRender = false;
		$model = $this->params['model'];
		$customFileds = false;

		$op = array();

		if(strrpos($field, '.')) {
			list($model, $field) = explode('.', $field);
			$this->loadModel($model);
		}

		$conditions[$model.'.'.$field.' LIKE'] = '%'.$query.'%';
		$options['conditions'] = $conditions;
		$options['contain'] = false;
		$results = $this->{$model}->find('all', $options);

		if(!empty($results)) {
			
			foreach($results as $result) {
				if(preg_match('/_date/', $field))
					$op['options'][] = date('', $result[$model][$field]);
				else
					if($customFileds){
						$op['options'][] = $result[0]['name'];
					}else{
						$op['options'][] = $result[$model][$field];
					}		
			}
		}


		echo json_encode($op);
	}

	public function admin_typeahead($field, $query = null) {
		$this->typeahead($field, $query = null);
	}

/**
* isUnique method
* Common function to find unique value of the given field
*
* @return boolean
*/
	public function isUnique() {
		$this->autoRender = false;
		$model = $this->params['model'];
		$condition = Hash::flatten($this->request->data);
		$field = key($condition);
		// debug($field);exit;
		if(strrpos($field, '.')) {
			list($model, $field) = explode('.', $field);
			$this->loadModel($model);
		}
		$this->{$model}->set($this->request->data);
		if($this->{$model}->validates(array('fieldList' => array($field)))) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

	public function lastQuery($model) {
		$dbo = $this->$model->getDatasource();
		$logs = $dbo->getLog();
		$lastLog = end($logs['log']);
		return $lastLog['query'];
	}


/**
* admin_isUnique method
* Alias method for isUnique for admin panel
*
* @return boolean
*/
	public function admin_isUnique() {
		$this->isUnique();
	}

	private function _setLanguage() {
	//if the cookie was previously set, and Config.language has not been set
	//write the Config.language with the value from the Cookie
	    if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
	        $this->Session->write('Config.language', $this->Cookie->read('lang'));
	    }
	    //if the user clicked the language URL
	    else if ( 	isset($this->params['language']) &&
		($this->params['language'] !=  $this->Session->read('Config.language'))
	    		) {
	    	//then update the value in Session and the one in Cookie
	        $this->Session->write('Config.language', $this->params['language']);
	        $this->Cookie->write('lang', $this->params['language'], false, '20 days');
	    }
	}

	//override redirect
	public function redirect( $url, $status = NULL, $exit = true ) {
		if (!isset($url['language']) && $this->Session->check('Config.language')) {
			$url['language'] = $this->Session->read('Config.language');
		}
		parent::redirect($url,$status,$exit);
	}


/**
 *
 * array_key_recursive_replace method
 *
 * @param array The input array.
 * @param search_pattern The value being searched for, otherwise known as the needle.
 * @param replace The replacement value that replaces found search_pattern values.
 * @return array
 */
	protected function array_key_recursive_replace (array $array, $search_pattern, $replace) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				$array[$k] = $this->array_key_recursive_replace($v, $search_pattern, $replace);
			} else {
				if(preg_match("/" . preg_quote($search_pattern) . "/", $k)) {
					$newK = str_replace($search_pattern, $replace, $k);
					$array[$newK] = $v;
					unset($array[$k]);
				}
			}
		}

		return $array;
	}
/**
 *
 * array_key_underscore method
 */

	protected function array_key_underscore (array $array) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				$array[$k] = $this->array_key_underscore($v);
			} else {
					$newK = Inflector::underscore($k);
					$array[$newK] = $v;
					unset($array[$k]);
			}
		}
		return $array;
	}


	protected function array_key_variable (array $array) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				$array[$k] = $this->array_key_variable($v);
			} else {
					$newK = Inflector::variable($k);
					$array[$newK] = $v;
					unset($array[$k]);
			}
		}
		return $array;
	}


/**
 * walk_recursive_remove method
 *
 * http://uk1.php.net/array_walk_recursive implementation that is used to remove nodes from the array.
 *
 * @param array The input array.
 * @param callable $callback Function must return boolean value indicating whether to remove the node.
 * @return array
 */
	protected function walk_recursive_remove (array $array, callable $callback) {
	    foreach ($array as $k => $v) {
	        if (is_array($v)) {
	            $array[$k] = $this->walk_recursive_remove($v, $callback);
	        } else {
	            if ($callback($v, $k)) {
	                unset($array[$k]);
	            }
	        }
	    }
	    return $array;
	}

/**
 *
 * keys_to_remove method
 *
 * @param array The input array.
 * @param callable $callback Function must return boolean value indicating whether to remove the node.
 * @return array
 */
	protected function keys_to_remove ($item, $key) {
		if(empty($this->keysToRemove)) {
			throw new NotFoundException(__('Set $this->keysToRemove = array(); to remove keys'));
		}
		if(in_array($key, $this->keysToRemove)) {
			return true;
		}

		return false;
	}

/**
 * debug_email method
 * To debug or check email's html
 *
 * @param  string
 * @param  array
 * @param  string
 * @return html
 */
    protected function debug_email($content_template, $viewData = [], $layout = 'default') {

        if(!empty($viewData)) {
            foreach($viewData as $key=>$var) {
                $this->set($key, $var);
            }
        }

        // setup layout and a View instance
        $this->layout = 'Emails/html/'.$layout;
        $View = new View($this, false);

        // render the email template including the layout into a variable
        $html = $View->render('../Emails/html/'.$content_template);

        // print the contents on screen (do NOT use pr() here!)
        print_r($html);
    }

    public function register_dimensions() {}

    public function admin_register_dimensions() {
    	$this->register_dimensions();
    }

    public function user_register_dimensions() {
    	$this->register_dimensions();
    }

/**
 * admin_updateimage method
 */
   public function admin_updateimage($fieldname = null, $id = null, $confirm = null, $model = null){
   		if($model){
   			$model = $model;
   		}else{
   			$model = $this->request->params['model'];
   		}
		$modelName = Inflector::singularize(Inflector::humanize($this->request->params['controller']));
		if(is_int((int)$id)) {
			$this->{$model}->id = $id;
			if (!$this->{$model}->exists()) {
				$this->flash = array('message'=>'This '.$modelName.' is already deleted or doesn\'t exist', 'class'=>'info');
				$this->redirect = true;
			}
		}
		if(!$confirm) {
			$this->set(compact('id', 'model', 'modelName', 'fieldname'));
			$this->render('/Elements/delete_image');
		} else {
				$findData = $this->$model->find('first', ['conditions'=> [$model.'.id' => $id], 'contain' => false]);
				$getImage = $findData[$model][$fieldname];
				$file = WWW_ROOT . "files" . DS . Inflector::underscore($model) . DS . $fieldname. DS . $id. DS . $getImage;
				@unlink($file);
				$this->$model->updateAll(array($model.'.'.$fieldname => null),
 	   				array($model.'.id' => $id));
				$this->flash = array('message'=>''.Inflector::pluralize($modelName).' file deleted', 'class'=>'success');
				$this->redirect = true;

		}
   }

   public function user_updateimage($fieldname = null, $id = null, $confirm = null) {
   		$model = $this->request->params['model'];
    	$this->admin_updateimage($fieldname, $id, $confirm, $model);
    }


    public function supplier_updateimage($fieldname = null, $id = null, $confirm = null) {
   		$model = $this->request->params['model'];
    	$this->admin_updateimage($fieldname, $id, $confirm, $model);
    }

    public function agent_updateimage($fieldname = null, $id = null, $confirm = null) {
   		$model = $this->request->params['model'];
    	$this->admin_updateimage($fieldname, $id, $confirm, $model);
    }

    public function corporate_updateimage($fieldname = null, $id = null, $confirm = null) {
   		$model = $this->request->params['model'];
    	$this->admin_updateimage($fieldname, $id, $confirm, $model);
    }

	/**
	 *
	 * array_key_exists_recursive method
	 *
	 * @param array Needle.
	 * @param array Haystack.
	 * @return array
	 */
	protected function array_key_exists_recursive($needle, $haystack) {
		$result = array_key_exists($needle, $haystack);
		if ($result)
			return $result;
		foreach ($haystack as $v)
		{
			if (is_array($v) || is_object($v))
				$result = $this->array_key_exists_recursive($needle, $v);
			if ($result)
				return $result;
		}
		return $result;
	}   
/**
	 *
	 * array remove if same id exit method
	 *
	 * @param array Needle.
	 * @param array Haystack.
	 * @return array
	 */
	public function unique_multidim_array($array, $key) {
		$temp_array = array();
		$i = 0;
		$key_array = array();
		foreach($array as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	} 
/**
 * getDatesFromRange function
 *
 * @var string Start Date
 * @var string End Date
 * @return array Array with dates  
 */
    public function getDatesFromRange($start, $end) {
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(
             new DateTime($start),
             $interval,
             $realEnd
        );

        foreach($period as $date) {
            $array[] = $date->format('Y-m-d');
        }

        return $array;
    }
/**
 * soapCall method
 *
 * @return void
 */
	 public function soapCall($xmlRequest, $action_URL, $apiURl){

		$client = new SoapClient(null, array(
			'location' => $apiURl,
			'uri'      => $action_URL,
			'trace'    => 1,
		));

		try{
			$xmlResponseRequest = $client->__doRequest($xmlRequest, $apiURl, $action_URL, 1);
			//Get response from here
			//print_r($xmlResponse);
			$xmlResponse = Xml::toArray(Xml::build($xmlResponseRequest));
		}catch (SoapFault $exception){
			//var_dump(get_class($exception));
			//var_dump($exception);
			$xmlResponse = $exception;
		}

		return $xmlResponse;

	 }
/**
 * supplierMarkupAndTotalPriceCalculation method
 *
 * @return void
 */
	public function supplierMarkupAndTotalPriceCalculation($price, $is_percentage, $markupValue){
		if($is_percentage) {
			$original_price1 = ($markupValue * 0.01) * $price;
			$original_price = $original_price1 + $price;
		}else{
			if($markupValue){
				$original_price = $price + $markupValue;
			}else{
				$original_price = $price;
			}
		}
		return round($original_price, 2);
	}

/**
 * currency_conversion_code method
 *
 * @return void
 */
	public function currency_conversion_code($cost, $costCurrency, $convertCurrencyId, $conversion_rate) {
		$originalCost = $cost;
		$originalCurrency = $costCurrency;
		//$sessionCurrency['Currency'] = CakeSession::read('Currency');
		if($costCurrency !== $convertCurrencyId) {
			$this->loadModel('Currency');
			$currencyConversion = $this->Currency->find('first' ,['contain' => false,'conditions'=>['Currency.id' => $costCurrency ,'not' => ['Currency.conversion_rate' => null]]]);
			//$conversion = $cost*2.2/100;
			//$cost = $cost + $conversion;
			if($conversion_rate == 1.000000){
				$cost = $cost / $currencyConversion['Currency']['conversion_rate'];
			}else{
				$cost = ($cost / $currencyConversion['Currency']['conversion_rate']) * $conversion_rate;
			}
		} else {
			$cost = $cost;
		}
		
		return round($cost, 2);
			
	}
/**
 * arraykeyreplace method
 *
 * @return void
 */
	public function arraykeyreplace($arr, $replace_from, $replace_to){
		$newArr = array();
		foreach($arr as $key => $value){
			$newArr[str_replace($replace_from, $replace_to, $key)] = (is_array($value)) ? $this->arraykeyreplace($value, $replace_from, $replace_to) : $value;
		}
		return $newArr;
	}




	protected function converCurrency($from,$to,$amount){
		$url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
		$request = curl_init(); 
		$timeOut = 0; 
		curl_setopt ($request, CURLOPT_URL, $url); 
		curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
		curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
		$response = curl_exec($request); 
		curl_close($request); 
		return $response;
	} 



	public function request($methods, $url, $requestParameter = ''){
		if($methods && $url){
			$hotelBedsUniqueSignature = hash("sha256", hotelBedsApiKey.hotelBedssharedSecret.time());
			$requesting = curl_init($url);                                                                      
			curl_setopt($requesting, CURLOPT_CUSTOMREQUEST, $methods);
			if($requestParameter){
				curl_setopt($requesting, CURLOPT_POSTFIELDS, $requestParameter);
			} 
			curl_setopt($requesting, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($requesting, CURLOPT_HTTPHEADER, array(                                             
				'Api-Key: '.hotelBedsApiKey,'X-Signature: '.$hotelBedsUniqueSignature,'Content-Type: application/json'));  
			$result = curl_exec($requesting);
			$response = json_decode($result, true);
			return $response;
		}
	}


}