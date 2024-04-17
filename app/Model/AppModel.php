<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

/**
 * Inserted ids for multiple saved records
 *
 * @var array
 */
	public $inserted_ids = array();

/**
 * Cache disable rule
 * Disable caches for the defined models
 *
 * @var array
 */
	public $noCacheModels = array();

/**
 * System default settings / options models
 *
 * @var array
 */
	public $appConfigModels = array(
		'Role', 'Menu', 'MenuLink', // for System Default
		//'Region', 'State', 'Zone', 'Branch', 'District', 'Taluka',
       // 'Interest', 'SellerType', 'SellerSubType', // For Retailer Dealer
	);

	

/**
 * Generate unique cache id
 *
 * @var array
 */
	protected function getUniqueCacheId($args) {
		$uniqueCacheId = '';
		foreach ($args as $arg) {
			$uniqueCacheId .= serialize($arg);
		}
		return md5($uniqueCacheId);
	}

/**
 * beforeFind function
 *
 * @var array
 */
	public function beforeFind($query) {
        // Print the query
        if(!empty($query['print'])) {
            pr($query);
        }
		return $query;
	}

/**
 * find function
 *
 * @var string
 * @var array
 */
	public function find($type = 'first', $query = array()) {
		$args = func_get_args();
		$params = Router::getParams();
		$keyPrefix = isset($query['keyPrefix']) ? $query['keyPrefix'] : '';

		unset($query['keyPrefix'], $query['paginating']);

		if($params['controller'] !== 'users' && $params['action'] !== 'login' && !in_array($this->alias, $this->noCacheModels))	{
            if(Configure::read('debug') == 0) {
                $uniqueCacheId = $this->getUniqueCacheId(array_merge($this->beforeFind($query), array('type'=>$type)));
                $key = $keyPrefix.'find-'.$this->alias.'-'.$uniqueCacheId;
                $config = !in_array($this->alias, $this->appConfigModels) ? 'find_paginate_cache' : 'find_paginate_app_cache';
                $find = Cache::read($key, $config);
                if (empty($find)) {
                    $find = parent::find($type, $query);
//  				debug(implode(' == ', array($this->alias, $key, $keyPrefix, $config)));
                    Cache::write($key, $find, $config);
                }
            } else {
                $find = parent::find($type, $query);
            }
			return $find;
		} else {
			return parent::find($type, $query);
		}
	}

/**
 * paginate function
 */
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$args = func_get_args();
		$keyPrefix = 'pagination-';
		$paginating = true;
		// debug($extra);exit;
		$contain = $extra['contain'];
		$joins = (!empty($extra['joins'])) ? $extra['joins'] : '';  
		if (!empty($extra['group'])) {
			$group = $extra['group'];
		}else{
			$group = '';
		}
        if (!empty($extra['attraction_custom_order'])) {
            $order = $extra['attraction_custom_order'];
        }

		$pagination = $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group', 'contain', 'paginating', 'keyPrefix', 'joins'));
		return $pagination;
	}

	public function paginateCount ($conditions = null, $recursive = 0, $extra = array()) {
		$fields = $order = $limit = $page = '';
		$args = func_get_args();
		$keyPrefix = 'paginationcount-';
		$paginating = true;
		$contain = $extra['contain'];
		if (!empty($extra['joins'])) {
			$joins = $extra['joins'];
		}else{
			$joins = '';
		}
		if (!empty($extra['group'])) {
			$group = $extra['group'];
		}else{
			$group = '';
		}
		$paginationcount = $this->find('count', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group', 'contain', 'paginating', 'keyPrefix', 'joins'));
		return $paginationcount;
	}

/**
 * beforeSave function
 *
 * @var array
 */
	public function beforeSave($options = array()) {
        // Added current logged in organization_id to the records
		/*if(!empty($this->validate['organization_id'])) {
			if(empty($this->data[$this->alias]['organization_id'])) {
				$this->data[$this->alias]['organization_id'] = AuthComponent::user("organization_id");
			}
		}*/

        // Added current logged in user_id to the records
		if(!empty($this->validate['user_id'])) {
			if(empty($this->data[$this->alias]['user_id'])) {
				$this->data[$this->alias]['user_id'] = AuthComponent::user("id");
			}
		}

        // Handle empty file upload
        if(!empty($this->actsAs['Upload.Upload'])) {
            foreach($this->actsAs['Upload.Upload'] as $field) {
                $path = implode('.', array($this->alias, $field));
                $value = Hash::get($this->data, $path);
                if(empty($value)) {
                    $this->data = Hash::remove($this->data, $path);
                }
            }
        }

//		$this->data = Hash::expand(array_map(function($value) { return $value == '' ? NULL : $value; }, Hash::flatten($this->data)));
		return true;
	}

/**
 * afterSave function
 *
 * @var boolean
 * @var array
 */
	public function afterSave($created, $options = array()) {
		if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }

		// Clear cache
		$this->clearOrgCache();

        return true;
	}

/**
 * clearOrgCache function
 * Clears organization grouped cache
 */
	public function clearOrgCache() {
		// Delete organization cache
		if(in_array($this->alias, $this->appConfigModels)) {
			Cache::clearGroup('org_'.AuthComponent::user("organization_id").'_app', 'find_paginate_app_cache');
			Cache::clearGroup('organizations', 'find_paginate_app_cache');
		}
		Cache::clearGroup('org_'.AuthComponent::user("organization_id"), 'find_paginate_cache');
		Cache::clearGroup('organizations', 'find_paginate_cache');
	}

/**
 * notify function
 *
 * @var array
 * @var array
 */
	public function notify($options, $users = null) {

		// Check if $options['action'] is boolean value
		if((is_bool($options['action']) === true)) {
			$options['action'] = ($options['action']) ? 'added' : 'updated';
		}
		if(empty($options['action'])) {
			$options['icon_label_class'] = ($options['action']) ? 'success' : 'info';
		}

		// Create base array for Notification
		$notificationBaseData['Notification'] = $options;
		$notificationBaseData['Notification']['by_user'] = AuthComponent::user('id');
		$notificationBaseData['Notification']['organization_id'] = AuthComponent::user('organization_id');

		// Initialize Notification model
		$this->Notification = ClassRegistry::init('Notification');

		if(empty($users) || isset($options['notifyAdmin'])) {
			// Unset notifyAdmin option
			unset($options['notifyAdmin']);

			$adminUsers = $this->Notification->User->find('all', array(
				'fields'=>array('id'),
				'conditions'=>array(
					'User.organization_id'=>AuthComponent::user('organization_id'), 'User.id NOT'=>AuthComponent::user('id'), 'User.id'=>'all',
					'OR' => array(
						array('Role.super_config'=>true),
						array('Role.config'=>true)
					)
				),
				'contain'=>array('Role.super_config', 'Role.config')
			));
			$adminUserList['User'] = Hash::extract($adminUsers, '{n}.User');

			$users = Hash::merge($adminUserList, $users);
		}

		foreach($users['User'] as $k=>$user) {
			$noticationData[$k] = $notificationBaseData;
			$noticationData[$k]['Notification']['user_id'] = $user['id'];
			if(!empty($user['message'])) {
				$noticationData[$k]['Notification']['message'] = $user['message'];
			}
			if(!empty($user['link'])) {
				$noticationData[$k]['Notification']['link'] = $user['link'];
			}
		}

		if(!empty($noticationData)) {
			$this->Notification->saveAll($noticationData);
		}
	}

	protected function getLastQuery() {
		$dbo = $this->getDatasource();
		$logs = $dbo->getLog();
		$lastLog = end($logs['log']);
		return $lastLog['query'];
	}
	/**
 * preg_grep_keys function
 * Regular expression search on array keys
 */
    public function preg_grep_keys($pattern, $input, $flags = 0) {
    	return array_intersect_key($input, array_flip(preg_grep($pattern, array_keys($input), $flags)));
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
			ClassRegistry::init('Currency');
		 	$currencyModel = new Currency();
			$currencyConversion = $currencyModel->find('first' ,['contain' => false,'conditions'=>['Currency.active'=>true , 'Currency.id' => $costCurrency ,'not' => ['Currency.conversion_rate' => null]]]);
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
 * dateFormatApp2Database function
 *
 * @var string
 * @return string 
 */
    public function dateFormatApp2Database($dateString) {
        return CakeTime::format($dateString, $this->app2DatabaseDateFormat);
    }

/**
 * datetimeFormatApp2Database function
 *
 * @var string
 * @return string 
 */
    public function datetimeFormatApp2Database($dateString) {
        return CakeTime::format($dateString, $this->app2DatabaseDateFormat.' %H:%M');
    }

/**
 * dateFormatDatabase2App function
 *
 * @var string
 * @return string 
 */
    public function dateFormatDatabase2App($dateString) {
        return CakeTime::format($dateString, $this->database2AppDateFormat);
    }

/**
 * datetimeFormatDatabase2App function
 *
 * @var string
 * @return string  
 */
    public function datetimeFormatDatabase2App($dateString) {
        return CakeTime::format($dateString, $this->database2AppDateFormat.' %H:%M');
    }
}
