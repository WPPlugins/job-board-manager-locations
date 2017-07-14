<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 




add_action( 'job_bm_action_location_single_main', 'job_bm_template_location_single_header', 10 );
add_action( 'job_bm_action_location_single_main', 'job_bm_template_location_single_job_list', 20 );	
	




function get_custom_post_type_template_location($single_template) {
     global $post;

     if ($post->post_type == 'location') {
          $single_template = job_bm_locations_plugin_dir . 'templates/location-single.php';
     }
     return $single_template;
}

add_filter( 'single_template', 'get_custom_post_type_template_location' );






if ( ! function_exists( 'job_bm_template_location_single_header' ) ) {

	
	function job_bm_template_location_single_header() {
				
		require_once( job_bm_locations_plugin_dir. 'templates/location-single-header.php');
	}
}





if ( ! function_exists( 'job_bm_template_location_single_job_list' ) ) {

	
	function job_bm_template_location_single_job_list() {
				
		require_once( job_bm_locations_plugin_dir. 'templates/location-single-job-list.php');
	}
}







if ( ! function_exists( 'job_bm_template_location_single_css' ) ) {

	
	function job_bm_template_location_single_css() {
				
		require_once( job_bm_locations_plugin_dir. 'templates/location-single-css.php');
	}
}








