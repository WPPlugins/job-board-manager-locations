<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_job_bm_locations_post_types{
	
	public function __construct(){
		
		add_action( 'init', array( $this, 'job_bm_locations_posttype_location' ), 0 );
		
		}
	
	public function job_bm_locations_posttype_location(){
		if ( post_type_exists( "location" ) )
		return;

		$singular  = __( 'Location', job_bm_locations_textdomain );
		$plural    = __( 'Locations', job_bm_locations_textdomain );
	 
	 
		register_post_type( "location",
			apply_filters( "register_post_type_location", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => __( $singular, job_bm_locations_textdomain ),
					'all_items'             => sprintf( __( 'All %s', job_bm_locations_textdomain ), $plural ),
					'add_new' 				=> __( 'Add New', job_bm_locations_textdomain ),
					'add_new_item' 			=> sprintf( __( 'Add %s', job_bm_locations_textdomain ), $singular ),
					'edit' 					=> __( 'Edit', job_bm_locations_textdomain ),
					'edit_item' 			=> sprintf( __( 'Edit %s', job_bm_locations_textdomain ), $singular ),
					'new_item' 				=> sprintf( __( 'New %s', job_bm_locations_textdomain ), $singular ),
					'view' 					=> sprintf( __( 'View %s', job_bm_locations_textdomain ), $singular ),
					'view_item' 			=> sprintf( __( 'View %s', job_bm_locations_textdomain ), $singular ),
					'search_items' 			=> sprintf( __( 'Search %s', job_bm_locations_textdomain ), $plural ),
					'not_found' 			=> sprintf( __( 'No %s found', job_bm_locations_textdomain ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', job_bm_locations_textdomain ), $plural ),
					'parent' 				=> sprintf( __( 'Parent %s', job_bm_locations_textdomain ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', job_bm_locations_textdomain ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> true,
				'query_var' 			=> true,
				'supports' 				=> array('title','editor','thumbnail','custom-fields'),
				'show_in_nav_menus' 	=> false,
				'show_in_menu' 	=> 'edit.php?post_type=job',				
				'menu_icon' => 'dashicons-admin-users',
			) )
		); 
	 
	 
		}
	
	
	}
	
	new class_job_bm_locations_post_types();