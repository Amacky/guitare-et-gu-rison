<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wp_lswss_Admin {

	function __construct() {
		
		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'lswss_post_sett_metabox') );

		// Action to save metabox
		add_action( 'save_post', array($this, 'lswss_save_metabox_value') );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this,'lswss_register_settings') );

		// Action to add custom column to Gallery listing
		add_filter( 'manage_'.LSWSS_POST_TYPE.'_posts_columns', array($this, 'lswss_posts_columns') );

		// Action to add custom column data to Gallery listing
		add_action('manage_'.LSWSS_POST_TYPE.'_posts_custom_column', array($this, 'lswss_post_columns_data'), 10, 2);

		// Filter to add row data
		add_filter( 'post_row_actions', array($this, 'lswss_add_post_row_data'), 10, 2 );

		// Action to add Attachment Popup HTML
		add_action( 'admin_footer', array($this,'lswss_image_update_popup_html') );

		// Ajax call to update option
		add_action( 'wp_ajax_lswss_get_attachment_edit_form', array($this, 'lswss_get_attachment_edit_form'));
		add_action( 'wp_ajax_nopriv_lswss_get_attachment_edit_form',array( $this, 'lswss_get_attachment_edit_form'));

		// Ajax call to update attachment data
		add_action( 'wp_ajax_lswss_save_attachment_data', array($this, 'lswss_save_attachment_data'));
		add_action( 'wp_ajax_nopriv_lswss_save_attachment_data',array( $this, 'lswss_save_attachment_data'));
	}

	/**
	 * Post Settings Metabox
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_post_sett_metabox() {
		
		// Getting all post types
		$all_post_types = array(LSWSS_POST_TYPE);
	
		add_meta_box( 'lswss-post-sett', __( 'Slick Logo showcase- Settings', 'logo-showcase-with-slick-slider' ), array($this, 'lswss_post_sett_mb_content'), $all_post_types, 'normal', 'high' );
		
		add_meta_box( 'lswss-post-slider-sett', __( 'Slick Logo showcase Parameter', 'logo-showcase-with-slick-slider' ), array($this, 'lswss_post_slider_sett_mb_content'), $all_post_types, 'normal', 'default' );	
		
	}
	
	/**
	 * Post Settings Metabox HTML
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_post_sett_mb_content() {
		include_once( LSWSS_DIR .'/includes/admin/metabox/lswss-sett-metabox.php');
	}

	/**
	 * Post Settings Metabox HTML
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_post_slider_sett_mb_content() {
		include_once( LSWSS_DIR .'/includes/admin/metabox/lswss-slider-parameter.php');
	}
	
	/**
	 * Function to save metabox values
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_save_metabox_value( $post_id ) {

		global $post_type;

		$registered_posts = array(LSWSS_POST_TYPE); // Getting registered post types

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( !current_user_can('edit_post', $post_id) )              			// Check if user can edit the post.
		|| ( !in_array($post_type, $registered_posts) ) )             			// Check if user can edit the post.
		{
		  return $post_id;
		}

		$prefix = LSWSS_META_PREFIX; // Taking metabox prefix
		
		
		// Taking variables
		$gallery_imgs 	= isset($_POST['lswss_img']) 										? lswss_slashes_deep($_POST['lswss_img']) 							: '';		

		// Getting Carousel Variables
		$show_title 				= isset($_POST[$prefix.'show_title']) 					? lswss_slashes_deep($_POST[$prefix.'show_title']) 							: 'false';
		$slide_to_show_carousel 	= isset($_POST[$prefix.'slide_to_show_carousel']) 		? lswss_slashes_deep($_POST[$prefix.'slide_to_show_carousel']) 		: '3';
		$slide_to_column_carousel 	= isset($_POST[$prefix.'slide_to_column_carousel']) 	? lswss_slashes_deep($_POST[$prefix.'slide_to_column_carousel']) 	: '1';
		$arrow_carousel 			= isset($_POST[$prefix.'arrow_carousel']) 				? lswss_slashes_deep($_POST[$prefix.'arrow_carousel']) 				: 'true';
		$pagination_carousel 		= isset($_POST[$prefix.'pagination_carousel']) 			? lswss_slashes_deep($_POST[$prefix.'pagination_carousel']) 		: 'true';
		$speed_carousel 			= isset($_POST[$prefix.'speed_carousel']) 				? lswss_slashes_deep($_POST[$prefix.'speed_carousel']) 				: '1000';
		$autoplay_carousel 			= isset($_POST[$prefix.'autoplay_carousel']) 			? lswss_slashes_deep($_POST[$prefix.'autoplay_carousel']) 			: 'false';
		$autoplay_speed_carousel	= isset($_POST[$prefix.'autoplay_speed_carousel']) 		? lswss_slashes_deep($_POST[$prefix.'autoplay_speed_carousel']) 	: '';		
		$centermode_carousel 		= isset($_POST[$prefix.'centermode_carousel']) 			? lswss_slashes_deep($_POST[$prefix.'centermode_carousel']) 		: 'false';
		$space_between_carousel 	= isset($_POST[$prefix.'space_between_carousel']) 		? lswss_slashes_deep($_POST[$prefix.'space_between_carousel']) 		: '';
		$loop_carousel 				= isset($_POST[$prefix.'loop_carousel']) 				? lswss_slashes_deep($_POST[$prefix.'loop_carousel']) 				: 'true';
		$max_height 				= isset($_POST[$prefix.'max_height']) 					? lswss_slashes_deep($_POST[$prefix.'max_height']) 				: '250';
		$slide_to_show_ipad 		= isset($_POST[$prefix.'ipad']) 						? lswss_slashes_deep($_POST[$prefix.'ipad']) 						: '3';
		$slide_to_show_tablet 		= isset($_POST[$prefix.'tablet']) 						? lswss_slashes_deep($_POST[$prefix.'tablet']) 						: '2';
		$slide_to_show_mobile 		= isset($_POST[$prefix.'mobile']) 						? lswss_slashes_deep($_POST[$prefix.'mobile']) 						: '1';
		
		// Style option update		
		update_post_meta($post_id, $prefix.'gallery_id', $gallery_imgs);		

		// Updating Carousel settings
		update_post_meta($post_id, $prefix.'show_title', $show_title);
		update_post_meta($post_id, $prefix.'slide_to_show_carousel', $slide_to_show_carousel);
		update_post_meta($post_id, $prefix.'slide_to_column_carousel', $slide_to_column_carousel);
		update_post_meta($post_id, $prefix.'arrow_carousel', $arrow_carousel);
		update_post_meta($post_id, $prefix.'pagination_carousel', $pagination_carousel);
		update_post_meta($post_id, $prefix.'speed_carousel', $speed_carousel);
		update_post_meta($post_id, $prefix.'autoplay_carousel', $autoplay_carousel);
		update_post_meta($post_id, $prefix.'autoplay_speed_carousel', $autoplay_speed_carousel);		
		update_post_meta($post_id, $prefix.'centermode_carousel', $centermode_carousel);
		update_post_meta($post_id, $prefix.'space_between_carousel', $space_between_carousel);
		update_post_meta($post_id, $prefix.'loop_carousel', $loop_carousel);
		update_post_meta($post_id, $prefix.'max_height', $max_height);
		update_post_meta($post_id, $prefix.'ipad', $slide_to_show_ipad);
		update_post_meta($post_id, $prefix.'tablet', $slide_to_show_tablet);
		update_post_meta($post_id, $prefix.'mobile', $slide_to_show_mobile);
		
	}

	/**
	 * Function register setings
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_register_settings() {
		register_setting( 'lswss_plugin_options', 'lswss_options', array($this, 'lswss_validate_options') );
	}
	
	/**
	 * Validate Settings Options
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_validate_options( $input ) {
		
		$input['default_img'] 	= isset($input['default_img']) 	? lswss_slashes_deep($input['default_img']) 		: '';
		$input['custom_css'] 	= isset($input['custom_css']) 	? lswss_slashes_deep($input['custom_css'], true) 	: '';
		
		return $input;
	}

	/**
	 * Add custom column to Post listing page
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_posts_columns( $columns ) {

	    $new_columns['lswss_shortcode'] 	= __('Shortcode', 'logo-showcase-with-slick-slider');
	    $new_columns['lswss_photos'] 		= __('Number of Photos', 'logo-showcase-with-slick-slider');

	    $columns = lswss_add_array( $columns, $new_columns, 1, true );

	    return $columns;
	}

	/**
	 * Add custom column data to Post listing page
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_post_columns_data( $column, $post_id ) {

		global $post;

		// Taking some variables
		$prefix = LSWSS_META_PREFIX;
		$slider_style 	= get_post_meta( $post->ID, $prefix.'design_style', true );
	    switch ($column) {
	    	case 'lswss_shortcode':	    		
	    		echo '<div class="lswss-shortcode-preview">[slick_logo_carousel id="'.$post_id.'"]</div>';			
	    		break;
	    	case 'lswss_photos':
	    		$total_photos = get_post_meta($post_id, $prefix.'gallery_id', true);
	    		echo !empty($total_photos) ? count($total_photos) : '--';
	    		break;
		}
	}

	/**
	 * Function to add custom quick links at post listing page
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_add_post_row_data( $actions, $post ) {
		
		if( $post->post_type == LSWSS_POST_TYPE ) {
			return array_merge( array( 'lswss_id' => 'ID: ' . $post->ID ), $actions );
		}
		
		return $actions;
	}

	/**
	 * Image data popup HTML
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_image_update_popup_html() {

		global $post_type;

		$registered_posts = array(LSWSS_POST_TYPE); // Getting registered post types

		if( in_array($post_type, $registered_posts) ) {
			include_once( LSWSS_DIR .'/includes/admin/settings/lswss-img-popup.php');
		}
	}

	/**
	 * Get attachment edit form
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_get_attachment_edit_form() {

		// Taking some defaults
		$result 			= array();
		$result['success'] 	= 0;
		$result['msg'] 		= __('Sorry, Something happened wrong.', 'logo-showcase-with-slick-slider');
		$attachment_id 		= !empty($_POST['attachment_id']) ? trim($_POST['attachment_id']) : '';

		if( !empty($attachment_id) ) {
			$attachment_post = get_post( $_POST['attachment_id'] );

			if( !empty($attachment_post) ) {
				
				ob_start();

				// Popup Data File
				include( LSWSS_DIR . '/includes/admin/settings/lswss-img-popup-data.php' );

				$attachment_data = ob_get_clean();

				$result['success'] 	= 1;
				$result['msg'] 		= __('Attachment Found.', 'logo-showcase-with-slick-slider');
				$result['data']		= $attachment_data;
			}
		}

		echo json_encode($result);
		exit;
	}

	/**
	 * Get attachment edit form
	 * 
	 * @package Logo Showcase with Slick Slider
	 * @since 1.0.0
	 */
	function lswss_save_attachment_data() {

		$prefix 			= LSWSS_META_PREFIX;
		$result 			= array();
		$result['success'] 	= 0;
		$result['msg'] 		= __('Sorry, Something happened wrong.', 'logo-showcase-with-slick-slider');
		$attachment_id 		= !empty($_POST['attachment_id']) ? trim($_POST['attachment_id']) : '';
		$form_data 			= parse_str($_POST['form_data'], $form_data_arr);

		if( !empty($attachment_id) && !empty($form_data_arr) ) {

			// Getting attachment post
			$lswss_attachment_post = get_post( $attachment_id );

			// If post type is attachment
			if( isset($lswss_attachment_post->post_type) && $lswss_attachment_post->post_type == 'attachment' ) {
				$post_args = array(
									'ID'			=> $attachment_id,
									'post_title'	=> !empty($form_data_arr['lswss_attachment_title']) ? $form_data_arr['lswss_attachment_title'] : $lswss_attachment_post->post_name,
									'post_content'	=> $form_data_arr['lswss_attachment_desc'],
									'post_excerpt'	=> $form_data_arr['lswss_attachment_caption'],
								);
				$update = wp_update_post( $post_args, $wp_error );

				if( !is_wp_error( $update ) ) {

					update_post_meta( $attachment_id, '_wp_attachment_image_alt', lswss_slashes_deep($form_data_arr['lswss_attachment_alt']) );
					update_post_meta( $attachment_id, $prefix.'attachment_link', lswss_slashes_deep($form_data_arr['lswss_attachment_link']) );

					$result['success'] 	= 1;
					$result['msg'] 		= __('Your changes saved successfully.', 'logo-showcase-with-slick-slider');
				}
			}
		}
		echo json_encode($result);
		exit;
	}
}

$wp_lswss_admin = new Wp_lswss_Admin();