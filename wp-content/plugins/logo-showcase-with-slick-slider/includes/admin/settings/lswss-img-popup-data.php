<?php
/**
 * Popup Image Data HTML
 *
 * @package Logo Showcase with Slick Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

$prefix = LSWSS_META_PREFIX;

// Taking some values
$alt_text 			= get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
$attachment_link 	= get_post_meta( $attachment_id, $prefix.'attachment_link', true );
?>

<div class="lswss-popup-title"><?php _e('Edit Image', 'logo-showcase-with-slick-slider'); ?></div>
	
<div class="lswss-popup-body">

	<form method="post" class="lswss-attachment-form">
		
		<?php if( !empty($attachment_post->guid) ) { ?>
		<div class="lswss-popup-img-preview">
			<img src="<?php echo $attachment_post->guid; ?>" alt="" />
		</div>
		<?php } ?>
		<a href="<?php echo get_edit_post_link( $attachment_id ); ?>" target="_blank" class="button right"><i class="dashicons dashicons-edit"></i> <?php _e('Edit Image From Attachment Page', 'logo-showcase-with-slick-slider'); ?></a>

		<table class="form-table">
			<tr>
				<th><label for="lswss-attachment-title"><?php _e('Title', 'logo-showcase-with-slick-slider'); ?>:</label></th>
				<td>
					<input type="text" name="lswss_attachment_title" value="<?php echo lswss_esc_attr($attachment_post->post_title); ?>" class="large-text lswss-attachment-title" id="lswss-attachment-title" />
					<span class="description"><?php _e('Enter image title.', 'logo-showcase-with-slick-slider'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="lswss-attachment-alt-text"><?php _e('Alternative Text', 'logo-showcase-with-slick-slider'); ?>:</label></th>
				<td>
					<input type="text" name="lswss_attachment_alt" value="<?php echo lswss_esc_attr($alt_text); ?>" class="large-text lswss-attachment-alt-text" id="lswss-attachment-alt-text" />
					<span class="description"><?php _e('Enter image alternative text.', 'logo-showcase-with-slick-slider'); ?></span>
				</td>
			</tr>		

			<tr>
				<th><label for="lswss-attachment-link"><?php _e('Image Link', 'logo-showcase-with-slick-slider'); ?>:</label></th>
				<td>
					<input type="text" name="lswss_attachment_link" value="<?php echo esc_url($attachment_link); ?>" class="large-text lswss-attachment-link" id="lswss-attachment-link" />
					<span class="description"><?php _e('Enter image link. e.g http://wponlinesupport.com', 'logo-showcase-with-slick-slider'); ?></span>
				</td>
			</tr>

			<tr>
				<td colspan="2" align="right">
					<div class="lswss-success lswss-hide"></div>
					<div class="lswss-error lswss-hide"></div>
					<span class="spinner lswss-spinner"></span>
					<button type="button" class="button button-primary lswss-save-attachment-data" data-id="<?php echo $attachment_id; ?>"><i class="dashicons dashicons-yes"></i> <?php _e('Save Changes', 'logo-showcase-with-slick-slider'); ?></button>
					<button type="button" class="button lswss-popup-close"><?php _e('Close', 'logo-showcase-with-slick-slider'); ?></button>
				</td>
			</tr>
		</table>
	</form><!-- end .lswss-attachment-form -->

</div><!-- end .lswss-popup-body -->