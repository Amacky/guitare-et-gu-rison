<?php
/**
 * 'meta_gallery_carousel' Shortcode
 * 
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function lswss_logo_carousel( $atts, $content ) {
	
	extract(shortcode_atts(array(
		'id'				=> '',
	), $atts));
	
	// Taking some globals
	global $post;

	// Taking some variables
	$unique 		= lswss_get_unique();
	$gallery_id 	= !empty($id) ? $id	: $post->ID;

	$prefix = LSWSS_META_PREFIX; // Metabox prefix
	
	$show_title 		= get_post_meta( $gallery_id, $prefix.'show_title', true );
	$show_title 		= ($show_title == 'false') ? 'false' : 'true';	
	
	$slide_to_show		= get_post_meta( $gallery_id, $prefix.'slide_to_show_carousel', true );
	$slide_to_show 		= (!empty($slide_to_show)) ? $slide_to_show : '3';
	
	$slide_to_column	= get_post_meta( $gallery_id, $prefix.'slide_to_column_carousel', true );
	$slide_to_column	= (!empty($slide_to_column)) ? $slide_to_column : '1';
	
	$arrow				= get_post_meta( $gallery_id, $prefix.'arrow_carousel', true );
	$arrow 				= ($arrow == 'false') ? 'false' : 'true';
	
	$pagination 		= get_post_meta( $gallery_id, $prefix.'pagination_carousel', true );
	$pagination 		= ($pagination == 'false') ? 'false' : 'true';	
	
	$speed 				= get_post_meta( $gallery_id, $prefix.'speed_carousel', true );
	$speed 				= (!empty($speed)) ? $speed : '300';

	$autoplay 			= get_post_meta( $gallery_id, $prefix.'autoplay_carousel', true );
	$autoplay 			= ($autoplay == 'false') ? 'false' : 'true';
	
	$autoplay_speed		= get_post_meta( $gallery_id, $prefix.'autoplay_speed_carousel', true );
	$autoplay_speed 	= (!empty($autoplay_speed)) ? $autoplay_speed : '3000';	

	$loop				= get_post_meta( $gallery_id, $prefix.'loop_carousel', true );
	$loop 				= ($loop == 'true') ? 'true' : 'false';

	$centermode 		= get_post_meta( $gallery_id, $prefix.'centermode_carousel', true );
	$centermode 		= ($centermode == 'true') ? 'true' : 'false';

	$space_between   	= get_post_meta( $gallery_id, $prefix.'space_between_carousel', true );
	$space_between 		= (!empty($space_between)) ? $space_between : '0';
	
	$max_height   		= get_post_meta( $gallery_id, $prefix.'max_height', true );
	$max_height 		= (!empty($max_height)) ? $max_height : '250';
	
	$slide_to_show_ipad	= get_post_meta( $gallery_id, $prefix.'ipad', true );
	$slide_to_show_ipad	= (!empty($slide_to_show_ipad)) ? $slide_to_show_ipad : '3';
	
	$slide_to_show_tablet	= get_post_meta( $gallery_id, $prefix.'tablet', true );
	$slide_to_show_tablet	= (!empty($slide_to_show_tablet)) ? $slide_to_show_tablet : '2';
	
	$slide_to_show_mobile	= get_post_meta( $gallery_id, $prefix.'mobile', true );
	$slide_to_show_mobile	= (!empty($slide_to_show_mobile)) ? $slide_to_show_mobile : '1';	
	
	
	$center_mode_cls	= ($centermode == 'true') ? 'lswss-center' : '';
	
	// Slider configuration
	$slider_conf = compact('slide_to_show', 'slide_to_column', 'pagination', 'arrow', 'speed','autoplay','autoplay_speed','space_between','centermode','loop','slide_to_show_ipad','slide_to_show_tablet','slide_to_show_mobile');

	// Enqueue required script
	wp_enqueue_script( 'jquery-slick' );
	wp_enqueue_script( 'lswss-public-script' );

	// Getting gallery images
	$images = get_post_meta($gallery_id, $prefix.'gallery_id', true);

	ob_start();
	
	if( $images ): ?>
		<style>
			#lswss-logo-carousel-<?php echo $unique; ?> .lswss-slide img{max-height:<?php echo $max_height; ?>px; }
		</style>
		
		<div class="lswss-logo-carousel-wrap lswss-clearfix">		
			<div id="lswss-logo-carousel-<?php echo $unique; ?>" class="lswss-logo-showcase <?php echo $center_mode_cls; ?>">					
					<?php foreach( $images as $image ): 
						
						$post_mata_data		= get_post($image);
						$image_lsider 		= wp_get_attachment_image_src( $image, 'large' );
						$image_link 		= get_post_meta($image, $prefix.'attachment_link',true);
						$alt_text 			= get_post_meta($image, '_wp_attachment_image_alt', true );	?>
						
						<div class="lswss-slide">						 	
							<?php if (!empty($image_link)) { ?>
								<a href="<?php echo $image_link; ?>"><img src="<?php echo $image_lsider[0]; ?>" alt="<?php echo esc_attr($alt_text); ?>" /> </a>
							<?php } else { ?>
								<img src="<?php echo $image_lsider[0]; ?>" alt="<?php echo esc_attr($alt_text); ?>" />
							<?php } ?>
						<?php if($show_title == 'true') { ?>	
							<div class="lswss-slide-title">		
								<?php echo $post_mata_data->post_title; ?>
							</div>
						<?php } ?>	
						</div>
					<?php endforeach; ?>				
				
			</div><!-- end .lswss-carousel -->			
			<div class="lswss-carousel-conf" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>	
		</div><!-- end .lswss-carousel-wrap -->
	<?php endif;
	
	$content .= ob_get_clean();
	return $content;
}

// 'meta_gallery_carousel' Shortcode
add_shortcode( 'slick_logo_carousel', 'lswss_logo_carousel' );