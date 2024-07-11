<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($triompher_columns).' post_format_'.esc_attr($triompher_post_format).(is_sticky() && !is_paged() ? ' sticky' : '') ); ?>
	<?php echo (!triompher_is_off($triompher_animation) ? ' data-animation="'.esc_attr(triompher_get_animation_classes($triompher_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$triompher_image_hover = triompher_get_theme_option('image_hover');
	// Featured image
	triompher_show_post_featured(array(
		'thumb_size' => triompher_get_thumb_size(strpos(triompher_get_theme_option('body_style'), 'full')!==false || $triompher_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $triompher_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $triompher_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>