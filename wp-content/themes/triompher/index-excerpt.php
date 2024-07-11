<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

triompher_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$triompher_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$triompher_sticky_out = triompher_get_theme_option('sticky_style')=='columns' 
							&& is_array($triompher_stickies) && count($triompher_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($triompher_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($triompher_sticky_out && !is_sticky()) {
			$triompher_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $triompher_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($triompher_sticky_out) {
		$triompher_sticky_out = false;
		?></div><?php
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