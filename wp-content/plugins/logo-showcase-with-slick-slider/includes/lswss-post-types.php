<?php
/**
 * Register Post type functionality
 *
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to register post type
 * 
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */
function lswss_register_post_type() {
	
	$lswss_post_lbls = apply_filters( 'lswss_post_labels', array(
								'name'                 	=> __('Slick Logo showcase', 'logo-showcase-with-slick-slider'),
								'singular_name'        	=> __('Slick Logo showcase', 'logo-showcase-with-slick-slider'),
								'add_new'              	=> __('Add Slider', 'logo-showcase-with-slick-slider'),
								'add_new_item'         	=> __('Add New Image Slider', 'logo-showcase-with-slick-slider'),
								'edit_item'            	=> __('Edit Image Slider', 'logo-showcase-with-slick-slider'),
								'new_item'             	=> __('New Image Slider', 'logo-showcase-with-slick-slider'),
								'view_item'            	=> __('View Image Slider', 'logo-showcase-with-slick-slider'),
								'search_items'         	=> __('Search Image Slider', 'logo-showcase-with-slick-slider'),
								'not_found'            	=> __('No Image Slider found', 'logo-showcase-with-slick-slider'),
								'not_found_in_trash'   	=> __('No Image Slider found in Trash', 'logo-showcase-with-slick-slider'),								
								'menu_name'           	=> __('Slick Logo showcase', 'logo-showcase-with-slick-slider')
							));

	$lswss_slider_args = array(
		'labels'				=> $lswss_post_lbls,
		'public'              	=> false,
		'show_ui'             	=> true,
		'query_var'           	=> false,
		'rewrite'             	=> false,
		'capability_type'     	=> 'post',
		'hierarchical'        	=> false,
		'menu_icon'				=> 'dashicons-format-gallery',
		'supports'            	=> apply_filters('lswss_post_supports', array('title')),
	);

	// Register slick slider post type
	register_post_type( LSWSS_POST_TYPE, apply_filters( 'lswss_registered_post_type_args', $lswss_slider_args ) );
}

// Action to register plugin post type
add_action('init', 'lswss_register_post_type');

/**
 * Function to update post message for team showcase
 * 
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */
function lswss_post_updated_messages( $messages ) {
	
	global $post, $post_ID;
	
	$messages[LSWSS_POST_TYPE] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'Image Gallery updated.', 'logo-showcase-with-slick-slider' ) ),
		2 => __( 'Custom field updated.', 'logo-showcase-with-slick-slider' ),
		3 => __( 'Custom field deleted.', 'logo-showcase-with-slick-slider' ),
		4 => __( 'Image Gallery updated.', 'logo-showcase-with-slick-slider' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Image Gallery restored to revision from %s', 'logo-showcase-with-slick-slider' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Image Gallery published.', 'logo-showcase-with-slick-slider' ) ),
		7 => __( 'Image Gallery saved.', 'logo-showcase-with-slick-slider' ),
		8 => sprintf( __( 'Image Gallery submitted.', 'logo-showcase-with-slick-slider' ) ),
		9 => sprintf( __( 'Image Gallery scheduled for: <strong>%1$s</strong>.', 'logo-showcase-with-slick-slider' ),
		  date_i18n( __( 'M j, Y @ G:i', 'logo-showcase-with-slick-slider' ), strtotime( $post->post_date ) ) ),
		10 => sprintf( __( 'Image Gallery draft updated.', 'logo-showcase-with-slick-slider' ) ),
	);
	
	return $messages;
}

// Filter to update slider post message
add_filter( 'post_updated_messages', 'lswss_post_updated_messages' );