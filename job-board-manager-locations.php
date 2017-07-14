<?php
/*
Plugin Name: Job Board Manager - Locations
Plugin URI: http://pickplugins.com
Description: Awesome location single page and display job list under any location via single page.
Version: 1.0.6
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class JobBoardManagerLocations{
	
	public function __construct(){
	
	//define('job_bm_locations_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('job_bm_locations_plugin_url', plugins_url('/', __FILE__)  );
	define('job_bm_locations_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('job_bm_locations_wp_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_locations_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/job-board-manager' );
	define('job_bm_locations_pro_url','http://www.pickplugins.com/item/job-board-manager-locations/' );
	define('job_bm_locations_demo_url', 'http://pickplugins.com/demo/job-board-manager/' );
	define('job_bm_locations_conatct_url', 'http://pickplugins.com/contact/' );
	define('job_bm_locations_qa_url', 'http://pickplugins.com/questions/' );
	define('job_bm_locations_plugin_name', 'Job Board Manager' );
	define('job_bm_locations_plugin_version', '1.0.6' );
	define('job_bm_locations_customer_type', 'free' );	 // pro & free	
	define('job_bm_locations_share_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_locations_tutorial_video_url', '//www.youtube.com/embed/YXwUFSU23iU?rel=0' );
	define('job_bm_locations_textdomain', 'job_bm_locations' );


	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
		
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');		
		

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'templates/location-single-template-functions.php');	

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'job_bm_locations_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'job_bm_locations_admin_scripts' ) );
	
	add_action( 'plugins_loaded', array( $this, 'job_bm_locations_load_textdomain' ));
	
	add_filter('widget_text', 'do_shortcode');
	}
		
		
	public function job_bm_locations_load_textdomain() {
	  load_plugin_textdomain( 'job_bm_locations', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' ); 
	}
		
		
		
	public function job_bm_locations_front_scripts(){
		
		wp_enqueue_script('jquery');
		//wp_enqueue_script( 'maps.google.js', plugins_url( '/assets/front/js/maps.google.js', __FILE__ ) );
		wp_enqueue_script( 'maps.google.js', 'http://maps.googleapis.com/maps/api/js');
		wp_enqueue_script('job_bm_locations_js', plugins_url( '/assets/front/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'job_bm_locations_js', 'job_bm_locations_ajax', array( 'job_bm_locations_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('job_bm_locations_style', job_bm_locations_plugin_url.'assets/front/css/style.css');
		wp_enqueue_style('job_bm_locations_location-single', job_bm_locations_plugin_url.'assets/front/css/location-single.css');
				
		
		}

	public function job_bm_locations_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-autocomplete');

		wp_enqueue_script('job_bm_locations_admin_js', plugins_url( '/assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'job_bm_locations_admin_js', 'job_bm_locations_ajax', array( 'job_bm_locations_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('job_bm_locations_admin_style', job_bm_locations_plugin_url.'assets/admin/css/style.css');


		}
	
	
	
	
	}

new JobBoardManagerLocations();