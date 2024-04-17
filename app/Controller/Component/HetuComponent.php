<?php
App::uses('Component', 'Controller');

class HetuComponent extends Component {
	public $components = array('Session', 'RequestHandler', 'Auth', 'Cache');
	
/**
 * [initialize]
 * 
 */
	public function initialize(Controller $controller) {
		$this->request = $controller->request;
		$this->response = $controller->response;
		
		$controller->request->params['model'] = Inflector::classify($controller->params['controller']);
		
		if ($this->Auth->loggedIn()) {
			// Set user roles into session & a svariable
			$this->userRole = $this->Auth->user('Role');
            $controller->isLoggedIn = true;
			$controller->set('isLoggedIn', true);
			$controller->set('userRole', $this->userRole);
			$this->initRoles();
			
			// Set caching config
			$prefix = 'org_'.$this->Auth->user('organization_id').'_';
			$cacheGroup = 'org_'.$this->Auth->user('organization_id');
			Cache::set(array('prefix'=>$prefix, 'groups'=>array($cacheGroup)), 'find_paginate_cache');
			Cache::set(array('prefix'=>$prefix.'app_', 'groups'=>array($cacheGroup.'_app')), 'find_paginate_app_cache');
		} else {
            $controller->isLoggedIn = false;
			$controller->set('isLoggedIn', false);
		}

		// Allow index action, if request is of a rss feed
		if ($this->request->is('rss') ) {
			$this->Auth->allow('index');
		}
		
		// Set layout to ajax, if request is of an ajax call
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
			
		$this->Controller = $controller;
    }
/**
 * [initRoles description]
 * 
 * @return [Array] [Message]
 */
	protected function initRoles() {
		switch($this->action) : 
			case 'add' :
				if(!$this->userRole['full_add']){
					$this->flash = array('message'=>'Oops, you are not allowed to access that link', 'class'=>'danger');
					$this->redirect = '/';
				}
			break;
			case 'edit' :
				if(!$this->userRole['full_edit']){
					$this->flash = array('message'=>'Oops, you are not allowed to access that link', 'class'=>'danger');
					$this->redirect = '/';	
				}
			break;
			case 'delete' :
				if(!$this->userRole['full_delete']){
					$this->flash = array('message'=>'Oops, you are not allowed to access that link', 'class'=>'danger');
					$this->redirect = '/';
				}
			break;
		endswitch;
	}
	
/**
 * [beforeRender description]
 * 
 * Handle flash messages
 * Handle validation errors
 * Check if request is coming from a form
 * 
 * @return [Array][Html]
 */
	public function beforeRender(Controller $controller) {
		$this->flash = $controller->flash;
		$this->redirect = $controller->redirect;
		$modelName = $this->request->params['model'];

		$response['status'] = 'success';
		
		// Handle flash messages
		if(!empty($this->flash)) {
			// Check if $this->flash is array, if not make it into an array
			if(empty($this->flash[0])) {
				$this->flash = array($this->flash);
			}
			
			$response['html'] = '<ul class="fa-ul">';
			foreach($this->flash as $flash) {
				$flashIcon = 'info-circle';
				if(!empty($flash['class'])) {
					if (preg_match("/\bsuccess\b/i", $flash['class'])) $flashIcon = 'check-circle';
					if (preg_match("/\bdanger\b/i", $flash['class'])) {
						$flashIcon = 'times-circle';
						$response['status'] = 'error';
					}
					$response['message'][] = $flash['message'];
					$response['html'] .= '<li><div class="text-'.$flash['class'].'"><i class="fa-li fa fa-'.$flashIcon.'"></i> '.$flash['message'].'</div></li>';
				}

				if(!empty($flash['data'])) {
					$response['data'] = $flash['data'];
				}
			}
			$response['html'] .= '</ul>';
		}
		
		// Handle validation errors
		if ($this->request->is(array('post', 'put'))) {
			if(isset($controller->{$modelName})) {
				$errors = $controller->{$modelName}->validationErrors;
				
				if(empty($this->flash['message'])) $this->flash['message'] = '';
				
				if(!empty($errors)) {
					$response['status'] = 'error';
					$errorMessages = '<ul class="fa-ul">';
					$this->flash['message'] = '&nbsp;&nbsp;'.$this->flash['message'];
					foreach($errors as $field => $fieldErrors) {
						foreach($fieldErrors as $fieldError ) {
							$response['message'][] = Inflector::humanize($field).': '.$fieldError;
							$errorMessages .= '<li><i class="fa-li fa fa-arrow-right"></i> '.Inflector::humanize($field).': '.$fieldError.'</li>';
						}
					}
					$errorMessages .= '</ul>';
					$response['html'] .= '<div class="alert alert-danger">And fix the below errors. <br><br>'.$errorMessages.'</div>';
				} else {
					$response['data'] = $controller->{$modelName}->find('all', [
						'conditions'=>[$modelName.'.id'=>$controller->{$modelName}->inserted_ids]
					]);
				}
			}
		}
		
		if(!empty($response['html'])) {
			if ($this->request->is('ajax')) {
				// Check if request is coming from a form
				if($this->request->is(array('post', 'put'))) {
					echo json_encode($response);
				} else {
					echo $response['html'];
				}
				exit;
			} else {
				if(isset($this->request->params['ext']) && in_array($this->request->params['ext'], ['json', 'xml'])) {
					$controller->set('response', $response);
			        $controller->set('_serialize', array('response'));
				} else {
					
					$this->Session->setFlash(__($response['html']), 'alerts', array('classType'=>$this->flash[0]['class']));

					if(!empty($this->redirect)) {
						if(!is_bool($this->redirect)) {
							$controller->redirect($this->redirect);
						} else {
							$controller->redirect($controller->referer());
						}
					} else {
						// Something may come up here
					}
				}
			}
		} else {
			// Something may come up here
		}
	}

/**
 * [named_index description]
 * To match OR operator in search
 * @param  array  $condition [Where clause conditions]
 * @param  [type] $model     [Model Name]
 * @return [type]            [description]
 */
	public function named_index($condition = array(), $model = null) {
	//	debug($this->request->params['named']); exit;
		if(!empty($this->request->params['named']) || !empty($condition)){
			
			foreach($this->request->params['named'] as $field=>$v) {
				
				if(!in_array($field, array('page', 'sort', 'direction', 'format',))) {
					$operator = $opPrepend = $opAppend = '';
					
					if(preg_match('/[!=<>]?[!=<>]/', $field, $matches)) {
						$operator = $matches[0];
						$opPrepend = $opAppend = '';
						$field = str_replace(' '.$operator, '', $field);
					}
					
					if(strrpos($field, '.')) {
						list($model, $field) = explode('.', $field);
					} else {
						$model = is_null($model) ? $this->request->params['model'] : $model;
					}
					
					$currentModel = is_null($model) ? Inflector::camelize(Inflector::singularize($this->Controller->name)) : $model;
					
					// If model is defined load the model
					if(!is_null($model)) {
						$this->Controller->loadModel($model);
					}
					
					if($model == $currentModel) {
						$fieldType = $this->Controller->$model->getColumnType($field);
					} else {
						$fieldType = $this->Controller->$currentModel->$model->getColumnType($field);
					}
//					debug($fieldType);
					switch($fieldType) {
						case 'float':
                            if(strrpos($v, '-')) {
                                $v = explode('-', $v);
                            }
						break;
						case 'integer':
                            if(!is_array($v)) {
                                if(strrpos($v, ',')) {
                                    $v = explode(',', $v);   
                                }
                            }
						break;
                        
						case 'boolean':
							$v = str_replace(array('true', 'false'), array('1', '0'), $v);
						break;
						
						case 'datetime':
							
						break;
						
						case 'date':
							
						break;
						
						case 'string':
							/*if(empty($operator)) {
								$operator = 'LIKE';
								$opPrepend = $opAppend = '%';
							}*/
						break;
					}
                    
					if($v === 'NULL') {
						$v = NULL;
                        if($operator == 'LIKE') $operator = '';
						$condition[$model.'.'.$field.' '.$operator] = $v;
						$searchString = 'Empty';
						continue;
					}
					
					if(is_array($v)) {
                        switch($fieldType) {
                        	
                            case 'integer':
                           // echo 'here';exit;
                           //debug($v);exit;
                           		if($operator === '<>' or $operator === '!=') {
	                                $condition['NOT'][$model.'.'.$field] = $v;
                           		} else if($operator === '><') {
                           			if(Hash::maxDimensions($v) > 1) {
	                           			foreach ($v as $k=>$data) {
		                            		$condition['OR'][$k][$model.'.'.$field.' '.' BETWEEN ? AND ?'] = $data;
			                            }
                           			} else {
                           				$condition[$model.'.'.$field.' '.' BETWEEN ? AND ?'] = $v;
                           			}
                           		}else if($operator === '!!') {
                           			// debug($v);
	                                $condition['OR'][] = [$model.'.'.$field => $v[0]];
	                                //debug($condition);
                           		}else if($operator === '!') {
                           			//echo 'here';exit;
	                                $condition['NOT'][$model.'.'.$field] = 'null';
                           		}  else {
                           			$condition[$model.'.'.$field] = $v;
                           		}
                            break;
                            
                            case 'datetime':
                            case 'date':
                                App::uses('CakeTime', 'Utility');
                                $condition[] = $v = CakeTime::daysAsSql($v[0], $v[1], $model.'.'.$field);
                            break;

                            default:
                            	$condition[$model.'.'.$field.' '.' BETWEEN ? AND ?'] = $v;
                            break;
						
                        }
						continue;
					} else {
					
						$v = trim($v);
					
						$searchString = $v;
						
						// To match for _date, created & modified date time fields
						if(in_array($fieldType, array('date', 'datetime'))) {
							
							$v = str_replace(' ', '-', $v);
							
							$isValidDate = $this->validateDate($v, array('Y-m-d', 'Y-M-d', 'M-d-Y', 'd-m-Y', 'd-m-y', 'd-M-Y'));
							
							if($isValidDate) {
								$condition[$model.'.'.$field.' '.$operator] = $isValidDate;
							} else {
								if(!is_numeric($v)) {
									// Not a number
									$condition['MONTH('.$model.'.'.$field.') '.$operator] = date('m', strtotime($v));
									$condition['YEAR('.$model.'.'.$field.') '.$operator] = date('Y', strtotime($v));
								} else {
									// Is a number
									$condition['YEAR('.$model.'.'.$field.') '.$operator] = $v;
								}
								
							}
							continue;
						}	
					}
					
					// To match OR operator in search
					if(strrpos($v, ' OR ')) {
						$values = explode(' OR ', $v);
						$searchString = '';
						foreach ($values as $k=>$value) {
							$searchString .= ($k > 0) ? ' <i>OR</i> '.$value : $value;
							$condition['OR'][][$model.'.'.$field.' '.$operator] = '%'.urldecode($value).'%';
						}
						continue;
					}
					
					$condition[trim($model.'.'.$field.' '.$operator)] = $opPrepend.urldecode($v).$opAppend;
				}
			}
			
			if(!empty($searchString) && !empty($this->request->query['source'])) {
				$this->Session->setFlash('Showing search result for <b class="badge badge-info">'.urldecode($searchString).'</b> in <b class="badge badge-success"><i>'.Inflector::humanize($field).'</i></b>', 'alerts', array('classType'=>'success'), 'search');
			}
//			debug($condition);	exit;
			return $condition;
		}
		return array();
	}
	
/**
 * 
 * @param  [int] $id        [ID to be deleted from System]
 * @param  [String] $model     [Model Name]
 * @param  [String] $modelName [Inflector::singularize(Inflector::humanize($this->request->params['controller']))]
 * @return [String]            [Html]
 */
	public function delete($id, $model, $modelName) {
		
		App::uses('BsHelper', 'View/Helper');
		$bs = new BsHelper(new View());
		
		$controller = $this->request->params['controller'];
		$urlParams = array('controller'=>$controller, 'action'=>'index'); 
		foreach($this->request->params['named'] as $key=>$value) {
			$urlParams[$key] = $value;
		}
		
		return '<div class="text-error" style="text-align: center;">Are you sure you want to delete '.$modelName.' #'.$id.'? &nbsp;&nbsp; '.
				$bs->link('<i class="icon-trash"></i> Yes, Delete', array('controller'=>$controller, 'action'=>'delete', $id, 'true'), array('class'=>'btn btn-danger postDeleteLink', 'escape'=>false)).
				$bs->link('<i class="icon-reload"></i> No', array(), array('class'=>'btn btn-primary', 'data-dismiss'=>'modal', 'escape'=>false)).
			 '</div>'.
			 "<script type='text/javascript'>
				$('.postDeleteLink').click(function(e){
					e.preventDefault();
					
					var modal_body = $(this).parents('.modal-body');

					var url = $(this).attr(\"href\");
					
					$(this).button('loading');
					
					$.post(url).done(function(data) {
						try {
							var json = $.parseJSON(data);
							var html = json.html;
						} catch (e) {
							// not json
							var html = data;
						}
					
						if(isNumber('".$id."')) {
							$('.".Inflector::variable($controller).".index').find('.tr_".$id."').addClass('animated slideOutRight').one('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function() { $(this).hide()});
						} else {
							$('#".Inflector::variable($controller)."Ajax').load('".$bs->url($urlParams)."', function() {
								$(this).children(':first').unwrap();
							});
						}
						modal_body.html(html);
					}).error(function() {
						alert(\"Error\");
					})
					return false;
				});
			</script>";
	}
	
/**
 * [array_prepend_key description]
 * @param  [Array] $arr        [Array junk]
 * @param  [String] $key_text   [key text on which string has to be prepended]
 * @param  [String] $appendName [Text to append]
 * @return [type]             [Array]
 */
	public function array_prepend_key($arr, $key_text, $appendName = null) {
		$arrNew = array();
		$appendInfo = '';
		foreach($arr as $k=>$v) {
			if(!empty($appendName)) {
				$appendInfo = ':'.Inflector::slug(strtolower($v));
			}
			$arrNew[$key_text.':'.$k.$appendInfo] = $v;
		}
		return $arrNew;
	}

/**
 * [updateNotifier description]
 * @param  string $action [type of Action performed]
 * @return [int] [updated ID]
 */
	public function updateNotifier($action = 'created') {
		App::uses('Organization', 'Model');
		$this->Organization = new Organization();
		
		$model = $this->request->params['model'];
		$modelId = ($model != 'Organization') ? $this->Organization->{$model}->id : $this->Organization->id;
		
		$orgUsers = $this->Organization->find('first', array('conditions'=>array('Organization.id'=>$this->Auth->user('organization_id')), 'contain'=>array('User.id') ) );
		foreach($orgUsers['User'] as $k=>$user) {
			if($user['id'] != $this->Auth->user('id')) {
				$noticationData[$k]['Notification']['user_id'] = $user['id'];
				$noticationData[$k]['Notification']['by_user'] = $this->Auth->user('id');
				$noticationData[$k]['Notification']['organization_id'] = $this->Auth->user('organization_id');
				$noticationData[$k]['Notification']['recordid'] = $modelId;
				$noticationData[$k]['Notification']['model'] = $model;
				$noticationData[$k]['Notification']['action'] = $action;
			}
		}
		
		$this->Organization->Notification->saveAll($noticationData);
	/*	if($this->Organization->Notification->saveAll($noticationData))
			pr('Saved');
		exit; */
	}
/**
 * [validateDate description]
 * @param  [date] $date         [Date]
 * @param  string $format       [Format in which Date is needed]
 * @param  string $returnFormat [Format in which date is need to be retrieved]
 * @return [String]               [false | Formatted date]
 */
	public function validateDate($date, $format = 'Y-m-d H:i:s', $returnFormat = 'Y-m-d') {
		if(is_array($format)) {
			$formats = $format;
			foreach($formats as $format) {
				$d = DateTime::createFromFormat($format, $date);
				if($d && $d->format($format) == $date) { // True
					return $d->format($returnFormat);
				}
			}
			return false;
		} else {
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) == $date;
		}
	}
}