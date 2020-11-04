<?php 

/*
* Plugin Name: Fygaro Donations
* Description: Integrate with Fygaro Commerce
* Version: 1.0
* Author: Dane Shingu
* Author URI: mailto:dane.shingu@gmail.com
*/

define('PLUGIN_NAME', 'fygaro_donations');

include('includes/metaboxes.php');
include('includes/custom_post_type.php');
include('includes/save_custom_post_type.php');
include('includes/shortcode.php');
include('includes/enqueue.php');


add_action('init', 'fygaro_donations_custom_init');
