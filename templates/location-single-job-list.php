<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$location_post_data = get_post(get_the_ID());
	
	
	echo '<h2 class="job-list-header">'.__(sprintf('Jobs available from - %s', $location_post_data->post_title),job_bm_locations_textdomain).'</h2>';		
	echo do_shortcode('[job_list meta_keys="job_bm_location" location="'.$location_post_data->post_title.'"]');