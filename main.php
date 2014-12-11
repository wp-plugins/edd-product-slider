<?php 
/**
Plugin Name: Easy Digital Download Slider Plugin
Plugin URI: http://wpbean.com/easy-digital-download-slider-plugin
Description: Showcase your EDD products with this slider plugin.
Author: wpbean
Version: 1.0
Author URI: http://wpbean.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/* admin specific functions */
if ( is_admin() ) {
	require_once dirname( __FILE__ ) . '/admin/admin.php';
}
require_once dirname( __FILE__ ) . '/wpb_scripts.php'; // CSS & JS file enqueue script
require_once dirname( __FILE__ ) . '/admin/wpb_aq_resizer.php'; // Image Resizer
require_once dirname( __FILE__ ) . '/wpb_shortcode.php'; // WPB EPS Shortcode

?>