<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


//--------------- Adding Latest jQuery------------//
function wpb_eps_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'wpb_eps_jquery');



//--------------- Adding modernizr ------------//
function wpb_eps_modernizr() {
	wp_deregister_script('modernizr'); // deregister
	wp_enqueue_script('wp_enqueue_scripts', plugins_url('/assets/js/modernizr.custom.js', __FILE__), false, '2.7.0', false);
}
if (!is_admin()) {
	add_action('wp_enqueue_scripts', 'wpb_eps_modernizr');
}	


//-------------- include js files---------------//
function wpb_eps_adding_scripts() {
	wp_register_script('wpb-owl-carousel', plugins_url('/assets/js/owl.carousel.js', __FILE__),array('jquery'),'1.3.2', false);
	wp_enqueue_script('wpb-owl-carousel');
}
if (!is_admin()) {
	add_action( 'wp_enqueue_scripts', 'wpb_eps_adding_scripts' ); 
}



//------------ include css files-----------------//
function wpb_wps_adding_style() {
	wp_register_style('wpb-owl-carousel-style', plugins_url('/assets/css/owl.carousel.css', __FILE__),'','1.3.2', false);
	wp_register_style('wpb-font-awesome', plugins_url('/assets/css/font-awesome.min.css', __FILE__),'','1.3.2', false);
	wp_register_style('wpb-eps-pluign-main-style', plugins_url('/assets/css/main.css', __FILE__),'','1.0', false);
	wp_enqueue_style('wpb-owl-carousel-style');
	wp_enqueue_style('wpb-font-awesome');
	wp_enqueue_style('wpb-eps-pluign-main-style');
}
if (!is_admin()) {
	add_action( 'init', 'wpb_wps_adding_style' );
}
