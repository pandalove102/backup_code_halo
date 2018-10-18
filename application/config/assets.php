<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| ASSETS PATH
|--------------------------------------------------------------------------
*/

$config['path_base'] 		= 'assets';
$config['path_js'] 		    = 'js';
$config['path_css'] 	    = 'css';
$config['path_img'] 		= 'img';

/*
|--------------------------------------------------------------------------
| GLOBAL STYLESHEETS
|--------------------------------------------------------------------------
| Render ra thẻ style ở header
*/

$config['global_stylesheets'] = array(
    'https://use.fontawesome.com/releases/v5.0.6/css/all.css',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'theme/styles/shards-dashboards.1.1.0.min.css'
);

/*
|--------------------------------------------------------------------------
| GLOBAL SCRIPTS
|--------------------------------------------------------------------------
| Render ra thẻ script ở footer
*/

$config['global_scripts'] = array(
    // App Dependencies
    'vendor/lodash/lodash.js', // optionally replaces Underscore.js with a library optimized for consistent performance
    'vendor/backbone/backbone-min.js', // provides the Model layer
    'vendor/knockout/build/output/knockout-latest.debug.js', // provides the ViewModel layer foundations for Knockback
    'vendor/knockback/knockback.js', // Knockback.js provides Knockout.js magic for Backbone.js Models and Collections.
    // 'vendor/knockout.validation/dist/knockout.validation.js',
    'vendor/backbone.localstorage/build/backbone.localStorage.js',
    'js/app/plugins.min.js', // Các plugins như bootstrap, datepicker này nọ

    // App Helper
    'js/app/ajax.js',
    'js/app/api.js', // Định nghĩa các API Endpoint Routes
    'js/app/helper.js',
    'js/app/other/theme.js', // Config các hàm, event tác động đến UI
);

/*
|--------------------------------------------------------------------------
| DEBUG
|--------------------------------------------------------------------------
| Các assets bổ sung để debug
*/

if(ENVIRONMENT !== ENV_PRODUCTION){
    $config['global_stylesheets'][] = 'vendor/highlight.js/styles/github.css';
    $config['global_scripts'][] = 'vendor/highlight.js/lib/highlight.js';
}