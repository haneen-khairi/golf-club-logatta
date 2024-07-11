<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_blog_style = explode('_', triompher_get_theme_option('blog_style'));
$triompher_columns = empty($triompher_blog_style[1]) ? 2 : max(2, $triompher_blog_style[1]);
$triompher_post_format = get_post_format();
$triompher_post_format = empty($triompher_post_format) ? 'standard' : str_replace('post-format-', '', $triompher_post_format);
$triompher_animation = triompher_get_theme_option('blog_animation');
$triompher_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($triompher_columns).' post_format_'.esc_attr($triompher_post_format) ); ?>
	<?php echo (!triompher_is_off($triompher_animation) ? ' data-animation="'.esc_attr(triompher_get_animation_classes($triompher_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($triompher_image[1]) && !empty($triompher_image[2])) echo intval($triompher_image[1]) .'x' . intval($triompher_image[2]); ?>"
	data-src="<?php if (!empty($triompher_image[0])) echo esc_url($triompher_image[0]); ?>"
	>

	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$triompher_image_hover = 'icon';
	if (in_array($triompher_image_hover, array('icons', 'zoom'))) $triompher_image_hover = 'dots';
	triompher_show_post_featured(array(
		'hover' => $triompher_image_hover,
		'thumb_size' => triompher_get_thumb_size( strpos(triompher_get_theme_option('body_style'), 'full')!==false || $triompher_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. triompher_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'triompher') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>