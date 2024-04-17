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
Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login', 'admin'=>true));
 
Router::connect('/about-us', array('controller' => 'pages', 'action' => 'about_us'));  
Router::connect('/our-teams', array('controller' => 'our_teams', 'action' => 'index'));  
Router::connect('/our-scholars', array('controller' => 'our_teams', 'action' => 'scholar'));
Router::connect('/our-mentors', array('controller' => 'our_teams', 'action' => 'mentor'));
Router::connect('/brand', array('controller' => 'pages', 'action' => 'brand'));  
Router::connect('/why-spiritual', array('controller' => 'pages', 'action' => 'whyspiritual'));  
Router::connect('/sanatana-dharma', array('controller' => 'pages', 'action' => 'sanatanadharma'));  
Router::connect('/travel-tips', array('controller' => 'pages', 'action' => 'traveltips'));  
Router::connect('/testimonials', array('controller' => 'testimonials', 'action' => 'index')); 
Router::connect('/videos', array('controller' => 'videos', 'action' => 'index'));
Router::connect('/faqs', array('controller' => 'faqs', 'action' => 'index')); 
Router::connect('/contacts', array('controller' => 'contact_enqueries', 'action' => 'index'));  
Router::connect('/search_blog', array('controller' => 'blogs', 'action' => 'search_blog'));  
Router::connect('/search_video', array('controller' => 'videos', 'action' => 'search_video'));
Router::connect('/show_details', array('controller' => 'videos', 'action' => 'show_details'));
Router::connect('/our_journeys', array('controller' => 'packages', 'action' => 'index'));  


/*For SiteMap*/
Router::connect('/sitemap',array('controller' =>'dashboards','action' => 'view_sitemap', 'ext'=>'xml'));

/*Blog Categories Listing*/
Router::connect('/blogs/:blog_cat_slug',array('controller' => 'blog_categories', 'action' => 'index'),array('pass' => array('blog_cat_slug')));	

 /*Blog Tags*/
Router::connect('/blog_tags/:blog_tag_slug',array('controller' => 'blog_tags', 'action' => 'index'),array('pass' => array('blog_tag_slug')));

Router::connect('/video_tags/:video_tag_slug',array('controller' => 'blog_tags', 'action' => 'video_tags'),array('pass' => array('video_tag_slug')));

/*Blog Authur*/
Router::connect('/blog_authors/:blog_authur_slug',array('controller' => 'blog_authors', 'action' => 'index'),array('pass' => array('blog_authur_slug')));

/*Video Categories Listing*/
Router::connect('/videos/:video_cat_slug',array('controller' => 'video_categories', 'action' => 'index'),array('pass' => array('video_cat_slug')));	

/*Gallery Detail Page*/
Router::connect('/galleries/:gallery_slug',array('controller' => 'galleries', 'action' => 'view'),array('pass' => array('gallery_slug')));


/*Our Team Detail Page*/
Router::connect('/our_teams/:team_slug',array('controller' => 'our_teams', 'action' => 'view'),array('pass' => array('team_slug')));


/*package Listing Page*/

 
  /*For Blog Details Url*/
 Router::connect('/:slugMethod/:blog_slug-:id',array('controller' => 'blogs', 'action' => 'view'),
   array('pass' => array('slugMethod','blog_slug'),'id' => '[0-9]+')
 ); 

 /*Journey Detail Page With Slug*/
 Router::connect('/trail/:page_slug',array('controller' => 'our_journies', 'action' => 'view'),
    array('pass' => array('page_slug'))
 );

/*Slug Methods*/   
 Router::connect('/:pacakage_slug-:id',array('controller' => 'packages', 'action' => 'view'),
   array('pass' => array('pacakage_slug'),'id' => '[0-9]+')
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
