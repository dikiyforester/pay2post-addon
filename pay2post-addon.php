<?php
/*
Plugin Name: Pay2Post Addon
Description: Pay2Post Addon starter
Version: 1
Author: dikiy_forester
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Make sure APP_Listing class loaded.
add_action( 'appthemes_load', 'my_pay2post_addon_init', 12 );

/**
 * Instatiates Listing type
 */
function my_pay2post_addon_init() {
	require 'addon-class.php';

	new My_Pay2Post_Addon;
}
