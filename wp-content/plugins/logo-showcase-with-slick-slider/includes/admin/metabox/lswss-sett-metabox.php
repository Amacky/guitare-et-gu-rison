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

$gallery_imgs 	= get_post_meta( $post->ID, $prefix.'gallery_id', true );
$no_img_cls		= !empty($gallery_imgs) ? 'lswss-hide' : '';
?>

<table class="form-table lswss-post-sett-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="lswss-gallery-imgs"><?php _e('Choose Gallery Images', 'logo-showcase-with-slick-slider'); ?></label>
			</th>
			<td>
				<button type="button" class="button button-secondary lswss-img-uploader" id="lswss-gallery-imgs" data-multiple="true" data-button-text="<?php _e('Add to Gallery', 'logo-showcase-with-slick-slider'); ?>" data-title="<?php _e('Add Images to Gallery', 'logo-showcase-with-slick-slider'); ?>"><i class="dashicons dashicons-format-gallery"></i> <?php _e('Gallery Images', 'logo-showcase-with-slick-slider'); ?></button>
				<button type="button" class="button button-secondary lswss-del-gallery-imgs"><i class="dashicons dashicons-trash"></i> <?php _e('Remove Gallery Images', 'logo-showcase-with-slick-slider'); ?></button><br/>
				
				<div class="lswss-gallery-imgs-prev lswss-imgs-preview lswss-gallery-imgs-wrp">
					<?php if( !empty($gallery_imgs) ) {
						foreach ($gallery_imgs as $img_key => $img_data) {

							$attachment_url 		= wp_get_attachment_thumb_url( $img_data );
							$attachment_edit_link	= get_edit_post_link( $img_data );
					?>
							<div class="lswss-img-wrp">
								<div class="lswss-img-tools lswss-hide">
									<span class="lswss-tool-icon lswss-edit-img dashicons dashicons-edit" title="<?php _e('Edit Image in Popup', 'logo-showcase-with-slick-slider'); ?>"></span>
									<a href="<?php echo $attachment_edit_link; ?>" target="_blank" title="<?php _e('Edit Image', 'logo-showcase-with-slick-slider'); ?>"><span class="lswss-tool-icon lswss-edit-attachment dashicons dashicons-visibility"></span></a>
									<span class="lswss-tool-icon lswss-del-tool lswss-del-img dashicons dashicons-no" title="<?php _e('Remove Image', 'logo-showcase-with-slick-slider'); ?>"></span>
								</div>
								<img class="lswss-img" src="<?php echo $attachment_url; ?>" alt="" />
								<input type="hidden" class="lswss-attachment-no" name="lswss_img[]" value="<?php echo $img_data; ?>" />
							</div><!-- end .lswss-img-wrp -->
					<?php }
					} ?>
					
					<p class="lswss-img-placeholder <?php echo $no_img_cls; ?>"><?php _e('No Gallery Images', 'logo-showcase-with-slick-slider'); ?></p>

				</div><!-- end .lswss-imgs-preview -->
				<span class="description"><?php _e('Choose your desired images for gallery. Hold Ctrl key to select multiple images at a time.', 'logo-showcase-with-slick-slider'); ?></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .wtwp-tstmnl-table -->