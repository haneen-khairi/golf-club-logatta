<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

triompher_storage_set('blog_archive', true);

// Load scripts for 'Masonry' layout
if (substr(triompher_get_theme_option('blog_style'), 0, 7) == 'masonry') {
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'classie', triompher_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
	wp_enqueue_script( 'triompher-gallery-script', triompher_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );
}

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$triompher_classes = 'posts_container '
						. (substr(triompher_get_theme_option('blog_style'), 0, 7) == 'classic' ? 'columns_wrap' : 'masonry_wrap');
	$triompher_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$triompher_sticky_out = triompher_get_theme_option('sticky_style')=='columns' 
							&& is_array($triompher_stickies) && count($triompher_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($triompher_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$triompher_sticky_out) {
		if (triompher_get_theme_option('first_post_large') && !is_paged() && !in_array(triompher_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="<?php echo esc_attr($triompher_classes); ?>"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($triompher_sticky_out && !is_sticky()) {
			$triompher_sticky_out = false;
			?></div><div class="<?php echo esc_attr($triompher_classes); ?>"><?php
		}
		get_template_part( 'content', $triompher_sticky_out && is_sticky() ? 'sticky' : 'classic' );
	}
	
	?></div><?php

	triompher_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>