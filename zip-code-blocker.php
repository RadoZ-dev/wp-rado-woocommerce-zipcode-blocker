<?php

/**
 * Plugin Name: WP Rado Woocommerce Zip Code Blocker
 * Description: Plugin for blocking zip codes for the cities we don't deliever our products to.
 * Version:     0.1.0
 * Author:      Radoslav Zdravkovic
 * Text Domain: woocommerce-zip-code-blocker
 * Domain Path: /languages
 *
 */

use WoocommerceZipCodeBlocker\ZipCodeBlockerInit;

define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_VERSION',  '1.0.0' );
 
require 'vendor/autoload.php';

ZipCodeBlockerInit::getInstance();