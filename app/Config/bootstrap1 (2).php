<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));


Cache::config('short', array(
    'engine' => 'File',
    'duration' => '+5 hours',
    'path' => CACHE,
    'prefix' => 'cake_short_'
));


Cache::config('hotelbedsmodalitycache', array(
    'engine' => 'File',
    'duration' => '+5 hours',
    'path' => CACHE,
    'prefix' => 'cake_short_'
));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); // Loads a single plugin named DebugKit
 */
    CakePlugin::load('Authenticate'); //Loads a single plugin named Authenticate
    CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
    CakePlugin::load('Upload'); //Loads a single plugin named Upload
    CakePlugin::load('PhpExcel'); //Loads a single plugin named PhpExcel
    CakePlugin::load('CakePdf', array('bootstrap' => true, 'routes' => true));//Cake Pdf 
    Configure::write('CakePdf', array('engine' => 'CakePdf.DomPdf','pageSize'=>'A4', 'orientation' => 'portrait',));
    CakePlugin::load('GoogleCalendar');

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *      'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *      'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *      'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *      array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *      array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

CakePlugin::load('AssetCompress', array('bootstrap' => true));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));



/**
 * Asset compress and applications JS / CSS setup
 */
Configure::write('ASSET_COMPRESS_USAGE', false);

$css_array = [
    'css-common'=>[
        'open-sans', 'fonts/font-awesome.min', 'animate.min', 'perfect-scrollbar.min', 
        'bootstrap.3.3.6.min', 'jasny-bootstrap.min',
        'bootstrap-datepicker3.min', 'bootstrap-datetimepicker.min', 
        'uniform/uniform.default', 'select2/select2', 'select2/select2-bootstrap'
    ],
    'layout/theme/css-admin-theme'=>[
        'components', 'layout/layout', 'layout/themes/darkblue', 'layout/custom', 'bootstrap-theme-admin', 
    ],
    'css-common-front'=>[
        'bootstrap-datepicker3.min', 'bootstrap-datetimepicker.min','select2/select2'
    ],
    'css-common-front-internal' => [
        'leftmenu/leftmenustyles', 'tabs'
    ]
];

$script_array = [
    'js-jquery'=>[
        'jq/jquery-1.12.0.min', 'jq/jquery-migrate-1.3.0.min','jq/jquery.smoothdivscroll-1.3-min','tinymce/tinymce.min'
    ],
    'js-common'=>[
        'php', 'moment.min', 'holder',  
        'bootstrap.3.3.6.min', 'bs/bootstrap-typeahead', 'bs/bootstrap.jasny.min', 
        'bs/bootstrap-datepicker.min', 'bs/bootstrap-datetimepicker.min', 
        'jq/jquery.validate.min', 'jq/jquery.validate.additional-methods.min', 'jq/jquery.form.min', 
        'jq/jquery.uniform.min', 'jq/jquery.select2.min', 'tinymce/tinymce.min',
        'jq/jquery.perfect-scrollbar.min', 'jq/jquery.cookie.min'
    ],
    'js-admin-theme'=>[
        'jq/jquery.mask.min.js', 'metronic', 'layout', 'core'
    ],
    'js-front-theme'=>[
        'jq/jquery.mask.min.js', 'menu/script', 'bs/bootstrap.touchspin', 'jq/jquery.bxslider.min', 'jquery.toaster','core',
    ],
    'js-front-theme-home'=>[
        'jquery.mosaicflow'
    ],
    'application'=>[
        'application'
    ]
];

Configure::write('CSS_ARRAY', $css_array);
Configure::write('SCRIPT_ARRAY', $script_array);


//Tuatos SMS Details
/*define('tuatosSMSUsername', 'tuatos');
define('tuatosSMSPassword', 'kartik@1234');
define('tuatosSMSSenderID', 'TUATOS');*/
//Tuatos SMS Details


/* Google App Client Id */
define('CLIENT_ID', '1031358123230-pn5ke5ip6t03n4rq4hl9430u5viarhv1.apps.googleusercontent.com');
/* Google App Client Secret */
define('CLIENT_SECRET', '1fMxmiAZZ3XtbV3_D_JJEwDK');
/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://www.demo.efewa.com/user/crm_followups/api_demo_events');

/** 
 * HybridAuth component
 *
 */
$getCurrentServer = env('SERVER_NAME');

switch ($getCurrentServer) {
    case 'localhost':
        define('QUERY_DATABASE', 'pura_efewa');
        $googleCredential = ["id" => "1031358123230-pn5ke5ip6t03n4rq4hl9430u5viarhv1.apps.googleusercontent.com" ,"secret" => "1fMxmiAZZ3XtbV3_D_JJEwDK"];
        $facebookCredential = ["id" => "658195060989921", "secret" => "caa481d76b5b53cbe0bebd33c63828b2"];
        $twitterCredential = ["key" => "9FbAJbV8ENZ8ApBp8TAGvjdn9", "secret" => "GNAyGO8EiYUbH8eF9GMv5NfpGAC9m8laEsWhzsVya28aIAIynx"];
    break;

    case 'demo.efewa.com':
        define('QUERY_DATABASE', 'demo_puraefewa');
        $googleCredential = ["id" => "1031358123230-pn5ke5ip6t03n4rq4hl9430u5viarhv1.apps.googleusercontent.com" ,"secret" => "1fMxmiAZZ3XtbV3_D_JJEwDK"];
        $facebookCredential = ["id" => "164792397224715", "secret" => "69d2f986b55f83a96a8d8de3b14e35c4"];
        $twitterCredential = ["key" => "Rsum3Qs4j3yyQLko0nXweNUVo", "secret" => "hy0bDLymX3wiVTO1ARXwW1t3EwYIweiOK8hKbzreK3Ni2vKHj0"];
    break;
    
    default:
        define('QUERY_DATABASE', 'puraefewa1');
        $googleCredential = ["id" => "1031358123230-pn5ke5ip6t03n4rq4hl9430u5viarhv1.apps.googleusercontent.com" ,"secret" => "1fMxmiAZZ3XtbV3_D_JJEwDK"];
        //$googleCredential = ["id" => "1026520395184-sh99o2um0hhgijh3cj5fg9mgdcuatuu1.apps.googleusercontent.com" ,"secret" => "Y8paoCP4S8w_jxYAgmmDyNWZ"];
        $facebookCredential = ["id" => "164792397224715", "secret" => "69d2f986b55f83a96a8d8de3b14e35c4"];
        $twitterCredential = ["key" => "0gOefgQVPNyJlf5Rtl0waAe2E", "secret" => "OF1M5ePUHPd0go9pPls42MgAy6ZhxOJHxKZPCIWqOBbRIZOVMh"];
    break;
}

Configure::write('Hybridauth', array(
    // openid providers
    "Google" => array(
        "enabled" => true,
        "keys" => $googleCredential,
    ),
    "Twitter" => array(
        "enabled" => true,
        "keys" => $twitterCredential
    ),
    "Facebook" => array(
        "enabled" => true,
        "keys" => $facebookCredential
    ),
));

 // Default date format for database
    Configure::write('dateFormatDatabase', 'Y-m-d');

    // Default date format for application
    Configure::write('dateFormatApp', 'd-m-Y');