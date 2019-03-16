<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = LSWSS_META_PREFIX; // Metabox prefix

// Carousel Variables
$slide_to_show_carousel 	= get_post_meta( $post->ID, $prefix.'slide_to_show_carousel', true );
$slide_to_column_carousel 	= get_post_meta( $post->ID, $prefix.'slide_to_column_carousel', true );
$arrow_carousel 			= get_post_meta( $post->ID, $prefix.'arrow_carousel', true );
$pagination_carousel 		= get_post_meta( $post->ID, $prefix.'pagination_carousel', true );

$autoplay_carousel 			= get_post_meta( $post->ID, $prefix.'autoplay_carousel', true );
$autoplay_speed_carousel	= get_post_meta( $post->ID, $prefix.'autoplay_speed_carousel', true );
$loop_carousel 				= get_post_meta( $post->ID, $prefix.'loop_carousel', true );
$speed_carousel 			= get_post_meta( $post->ID, $prefix.'speed_carousel', true );

$centermode_carousel 		= get_post_meta( $post->ID, $prefix.'centermode_carousel', true );
$space_between_carousel 	= get_post_meta( $post->ID, $prefix.'space_between_carousel', true );

$show_title 				= get_post_meta( $post->ID, $prefix.'show_title', true );
$max_height 				= get_post_meta( $post->ID, $prefix.'max_height', true );

$ipad 						= get_post_meta( $post->ID, $prefix.'ipad', true );
$tablet 					= get_post_meta( $post->ID, $prefix.'tablet', true );
$mobile 					= get_post_meta( $post->ID, $prefix.'mobile', true );

?>

<div class="lswss-mb-tabs-wrp">	

	<div id="lswss-sdetails" class="lswss-sdetails lswss-tab-cnt lswss-carousel">
		<table class="form-table lswss-sdetails-tbl">			
			<tbody>
				<tr valign="top">
					<h4><?php _e('Slider Settings', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					<td scope="row">
						<label><?php _e('Logo Title', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>show_title" value="true" <?php checked( 'true', $show_title ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>show_title" value="false" <?php checked( 'false', $show_title ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable title for each logo','logo-showcase-with-slick-slider'); ?></em>
					</td>					
				</tr>
				<tr valign="top">
				<!--Slide To Show -->
					<td scope="row">
						<label><?php _e('Slide To Show', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
					<input type="number" min="1" step="1" name="<?php echo $prefix; ?>slide_to_show_carousel" value="<?php echo lswss_esc_attr($slide_to_show_carousel); ?>"><br/>
					<em style="font-size:11px;"><?php _e('Number of logos per view (Logos visible at the same time on slider container).','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>	
				<!--Slide To Scroll -->
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Slide To Scroll', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="number" min="1" step="1" name="<?php echo $prefix; ?>slide_to_column_carousel" value="<?php echo lswss_esc_attr($slide_to_column_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Set numbers of logos to define and enable group sliding.','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>					
			</tbody>
		</table>
		<table class="form-table lswss-sdetails-tbl">
			<tbody>
				<tr valign="top">
					<h4><?php _e('Arrows & Dots Settings', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					<td scope="row">
						<label><?php _e('Arrows', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>arrow_carousel" value="true" <?php checked( 'true', $arrow_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>arrow_carousel" value="false" <?php checked( 'false', $arrow_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable Arrows for logos slider','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>

				<tr valign="top">
					<td scope="row">
						<label><?php _e('Dots', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>pagination_carousel" value="true" <?php checked( 'true', $pagination_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>pagination_carousel" value="false" <?php checked( 'false', $pagination_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Display logos paginations','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>				
			</tbody>
		</table>
		<table class="form-table lswss-sdetails-tbl">
			<tbody>
				<tr valign="top">
					<h4><?php _e('Autoplay and Speed Settings', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					<td scope="row">
						<label><?php _e('Autoplay', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>autoplay_carousel" value="true" <?php checked( 'true', $autoplay_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>autoplay_carousel"  value="false" <?php checked( 'false', $autoplay_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable Autoplay for Slider','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>

				<tr valign="top">
					<td scope="row">
						<label><?php _e('Autoplay Speed', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>autoplay_speed_carousel" value="<?php echo lswss_esc_attr($autoplay_speed_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Speed', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>speed_carousel" value="<?php echo lswss_esc_attr($speed_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Duration of transition between slides (in ms)','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Loop', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>loop_carousel" value="true" <?php checked( 'true', $loop_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>loop_carousel" value="false" <?php checked( 'false', $loop_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Set to true to enable continuous loop mode','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				
			</tbody>
		</table>
		<table class="form-table lswss-sdetails-tbl">			
			<tbody>
				<tr valign="top">
					<h4><?php _e('Center Mode', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					<!--Slide To Show -->
					<td scope="row">
						<label><?php _e('Center Mode', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>centermode_carousel" value="true" <?php checked( 'true', $centermode_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>centermode_carousel" value="false" <?php checked( 'false', $centermode_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('If true, then active slide will be centered, not always on the left side.','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<!--Slide To Scroll -->
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Center Mode Padding', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>space_between_carousel" value="<?php echo lswss_esc_attr($space_between_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Padding from Left and Right in px.','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>					
			</tbody>
		</table>
		<table class="form-table lswss-sdetails-tbl">			
			<tbody>
				<tr valign="top">
					<h4><?php _e('Media Height Setting', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					<!--Slide To Show -->
					<td scope="row">
						<label><?php _e('Maximum Width', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>						
						<em style="font-size:14px;"><?php _e('Maximum Width is added 100% for better output. ','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<!--Slide To Scroll -->
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Maximum Height', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>max_height" value="<?php echo lswss_esc_attr($max_height); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Maximum Height for logo image. ie 200','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>					
			</tbody>
		</table>
		<table class="form-table lswss-sdetails-tbl">			
			<tbody>
				<tr valign="top">
					<h4><?php _e('Mobile Settings', 'logo-showcase-with-slick-slider') ?></h4>
					<hr>
					
					<!--iPad -->
					<td scope="row">
						<label><?php _e('Slide To Show in iPad', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
					<input type="number" min="1" step="1" name="<?php echo $prefix; ?>ipad" value="<?php echo lswss_esc_attr($ipad); ?>"><br/>
					<em style="font-size:11px;"><?php _e('Number of logos per view in iPad (Logos visible at the same time on slider container).','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<!--Tablet -->
				<tr valign="top">
					<!--iPad -->
					<td scope="row">
						<label><?php _e('Slide To Show in Tablet', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
					<input type="number" min="1" step="1" name="<?php echo $prefix; ?>tablet" value="<?php echo lswss_esc_attr($tablet); ?>"><br/>
					<em style="font-size:11px;"><?php _e('Number of logos per view in tablet (Logos visible at the same time on slider container).','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>
				<!--Mobile -->
				<tr valign="top">
					<!--iPad -->
					<td scope="row">
						<label><?php _e('Slide To Show in Mobile', 'logo-showcase-with-slick-slider'); ?></label>
					</td>
					<td>
					<input type="number" min="1" step="1" name="<?php echo $prefix; ?>mobile" value="<?php echo lswss_esc_attr($mobile); ?>"><br/>
					<em style="font-size:11px;"><?php _e('Number of logos per view in Mobile (Logos visible at the same time on slider container).','logo-showcase-with-slick-slider'); ?></em>
					</td>
				</tr>	
			</tbody>
		</table>
	</div>
</div>