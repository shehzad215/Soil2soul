<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'dashboards', 'action' => 'index'));    
Router::connect('/admin', array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true));
Router::connect('/admin/login', array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true));

Router::connect('/corporate-travel', array('controller' => 'pages', 'action' => 'corporate_travel'));
Router::connect('/meetings-incentives', array('controller' => 'pages', 'action' => 'meetings_incentives'));
Router::connect('/group-travels', array('controller' => 'pages', 'action' => 'group_travels'));
Router::connect('/technology', array('controller' => 'pages', 'action' => 'technology'));
Router::connect('/risk-mitigation', array('controller' => 'pages', 'action' => 'risk_mitigation'));
Router::connect('/business-intelligence', array('controller' => 'pages', 'action' => 'business_intelligence'));
Router::connect('/travel-program', array('controller' => 'pages', 'action' => 'travel_program'));
Router::connect('/consulting-integration', array('controller' => 'pages', 'action' => 'consulting_integration'));
Router::connect('/global-program', array('controller' => 'pages', 'action' => 'global_program'));
Router::connect('/insights', array('controller' => 'pages', 'action' => 'insights'));
Router::connect('/duty-of-care', array('controller' => 'pages', 'action' => 'duty_of_care'));   
Router::connect('/aboutus', array('controller' => 'enqueries', 'action' => 'index')); 
Router::connect('/join-our-team', array('controller' => 'pages', 'action' => 'join_our_team')); 
Router::connect('/partnerships', array('controller' => 'pages', 'action' => 'partnerships')); 
Router::connect('/privacy-policy', array('controller' => 'pages', 'action' => 'privacy_policy')); 
Router::connect('/blogs', array('controller' => 'blogs', 'action' => 'index')); 
 
Router::connect('/gallery', array('controller' => 'pages', 'action' => 'gallery')); 
Router::connect('/contactus', array('controller' => 'pages', 'action' => 'contactus')); 
Router::connect('/specialist-services', array('controller' => 'pages', 'action' => 'specialist_services')); 
Router::connect('/blogs/indexApi', array('controller' => 'blogs', 'action' => 'indexApi')); 

Router::connect('/sitemap',array('controller' =>'dashboards','action' => 'view_sitemap', 'ext'=>'xml'));



/*For Blog Details Url*/
Router::connect('/blogs/:blog_slug-:id',array('controller' => 'blogs', 'action' => 'view'),
   array('pass' => array('blog_slug'),'id' => '[0-9]+')
);

Router::connect('/blogs/:category_slug',array('controller' => 'blogs', 'action' => 'lists'),
   array('pass' => array('category_slug'))
);

Router::connect('/blog_tags/:tag_slug',array('controller' => 'blog_tags', 'action' => 'index'),
   array('pass' => array('tag_slug'))
);


	
Router::getParam('prefix', true);

/**
 * Parse special extensions to serve its request
 */
    //Router::mapResources(['attractions', 'users'], array('prefix'=>'api'));
	Router::parseExtensions('rss', 'json', 'xml', 'xls', 'pdf', 'xlsx');
	Router::setExtensions('pdf');
    
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
