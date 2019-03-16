<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class WP_Ssc_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'lswss_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'lswss_front_script') );
		
		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'lswss_admin_style') );
		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'lswss_admin_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_front_style() {
		
		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'slick-style', 'registered' ) ) {
			wp_register_style( 'slick-style', LSWSS_URL.'assets/css/slick.css', array(), LSWSS_VERSION );
			wp_enqueue_style( 'slick-style' );
		}
		
		
		// Registring and enqueing public css
		wp_register_style( 'lswss-public-css', LSWSS_URL.'assets/css/lswss-public.css', null, LSWSS_VERSION );
		wp_enqueue_style( 'lswss-public-css' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_front_script() {

		
		// Registring slick slider script
		
		wp_register_script( 'wpos-swiper-jquery', LSWSS_URL.'assets/js/swiper.min.js', array('jquery'), LSWSS_VERSION, true );
		
		// Registring slick slider script
		if( !wp_script_is( 'jquery-slick', 'registered' ) ) {
			wp_register_script( 'jquery-slick', LSWSS_URL.'assets/js/slick.min.js', array('jquery'), LSWSS_VERSION, true );
		}
		
		// Registring and enqueing public script
		wp_register_script( 'lswss-public-script', LSWSS_URL.'assets/js/lswss-public.js', array('jquery'), LSWSS_VERSION, true );
		wp_localize_script( 'lswss-public-script', 'Lswss', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 	=> (is_rtl()) 		? 1 : 0,
																	));

		
	}
	
	/**
	 * Enqueue admin styles
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_admin_style( $hook ) {

		global $post_type, $typenow;
		
		$registered_posts = array(LSWSS_POST_TYPE); // Getting registered post types

		// If page is plugin setting page then enqueue script
		if( in_array($post_type, $registered_posts) ) {
			
			// Registring admin script
			wp_register_style( 'lswss-admin-style', LSWSS_URL.'assets/css/lswss-admin.css', null, LSWSS_VERSION );
			wp_enqueue_style( 'lswss-admin-style' );
		}
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_admin_script( $hook ) {
		
		global $wp_version, $wp_query, $typenow, $post_type;
		
		$registered_posts = array(LSWSS_POST_TYPE); // Getting registered post types
		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts
		
		if( in_array($post_type, $registered_posts) ) {

			// Enqueue required inbuilt sctipt
			wp_enqueue_script( 'jquery-ui-sortable' );

			// Registring admin script
			wp_register_script( 'lswss-admin-script', LSWSS_URL.'assets/js/lswss-admin.js', array('jquery'), LSWSS_VERSION, true );
			wp_localize_script( 'lswss-admin-script', 'WplswssAdmin', array(
																	'new_ui' 				=>	$new_ui,
																	'img_edit_popup_text'	=> __('Edit Image in Popup', 'logo-showcase-with-slick-slider'),
																	'attachment_edit_text'	=> __('Edit Image', 'logo-showcase-with-slick-slider'),
																	'img_delete_text'		=> __('Remove Image', 'logo-showcase-with-slick-slider'),
																));
			wp_enqueue_script( 'lswss-admin-script' );
			wp_enqueue_media(); // For media uploader
		}
	}
}

$lswss_script = new WP_Ssc_Script();