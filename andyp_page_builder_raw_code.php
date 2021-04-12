<?php
/*
Plugin Name: _ANDYP - Page Builder - Raw Code
Plugin URI: http://londonparkour.com
Description: <em>PAGES > Page Builder Module - Raw Code</em>
Version: 1.0
Author: Andy Pearson
Author URI: http://londonparkour.com
*/

define( 'ANDYP_PAGEBUILDER_RAWCODE_PATH', __DIR__ );
define( 'ANDYP_PAGEBUILDER_RAWCODE_URL', plugins_url( '/', __FILE__ ) );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
new andyp\pagebuilder\rawcode\initialise;
