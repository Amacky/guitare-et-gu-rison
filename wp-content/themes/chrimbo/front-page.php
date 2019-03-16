<?php
/**
 * The template for displaying home page.
 * @package Chrimbo
 */
global $chrimbo_customizer_all_values;
get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
	include( get_home_template() );
    }

else{
	
		
		/**
		 * chrimbo_action_front_page hook
		 * @since chrimbo 1.0.0
		 *
		 * @hooked chrimbo_action_front_page -  10
		 * @hooked chrimbo_home_event_feature - 15
		 * @sub_hooked chrimbo_action_front_page -  30
		 * @hooked chrimbo book-event-ticket -25
		 * @hooked chrimbo_about_home_event-17
		 */
		do_action('chrimbo_action_front_page_slider');
		do_action( 'chrimbo_action_front_page' );

	
}
get_footer();