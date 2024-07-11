<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

if ( get_query_var('triompher_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$triompher_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($triompher_src[0])) {
		triompher_sc_layouts_showed('featured', false);
		if (false) {
			?><div class="sc_layouts_featured with_image <?php echo esc_attr(triompher_add_inline_css_class('background-image:url('.esc_url($triompher_src[0]).');')); ?>"></div><?php
		}
	}
}
?>