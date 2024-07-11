<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_link = get_permalink();
$triompher_post_format = get_post_format();
$triompher_post_format = empty($triompher_post_format) ? 'standard' : str_replace('post-format-', '', $triompher_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($triompher_post_format) ); ?>><?php
	triompher_show_post_featured(array(
		'thumb_size' => triompher_get_thumb_size( 'big' ),
		'show_no_image' => false,
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">' . triompher_get_post_categories('') . '</div>'
							. '<h6 class="post_title entry-title"><a href="' . esc_url($triompher_link) . '">' . wp_kses(get_the_title(), 'triompher_kses_content') . '</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="' . esc_url($triompher_link) . '">' . triompher_get_date() . '</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>