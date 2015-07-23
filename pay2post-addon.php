<?php
/*
Plugin Name: Pay2Post Addon
Description: Pay2Post Addon starter
Version: 1
Author: dikiy_forester
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Make sure Pay2Post_Plugin class loaded.
add_action( 'pay2post_register_listing_types', 'my_pay2post_addon_init' );

/**
 * Instatiates Listing type
 */
function my_pay2post_addon_init() {
	require 'addon-class.php';

	Pay2Post_Plugin::register_listing_type( 'mytype', 'My_Pay2Post_Addon' );
}
