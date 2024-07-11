<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_header_css = $triompher_header_image = '';
$triompher_header_video = triompher_get_header_video();
if (true || empty($triompher_header_video)) {
	$triompher_header_image = get_header_image();
	if (triompher_is_on(triompher_get_theme_option('header_image_override')) && apply_filters('triompher_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($triompher_cat_img = triompher_get_category_image()) != '')
				$triompher_header_image = $triompher_cat_img;
		} else if (is_singular() || triompher_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$triompher_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($triompher_header_image)) $triompher_header_image = $triompher_header_image[0];
			} else
				$triompher_header_image = '';
		}
	}
}

?><header class="top_panel top_panel_default<?php
					echo !empty($triompher_header_image) || !empty($triompher_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($triompher_header_video!='') echo ' with_bg_video';
					if ($triompher_header_image!='') echo ' '.esc_attr(triompher_add_inline_css_class('background-image: url('.esc_url($triompher_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (triompher_is_on(triompher_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(triompher_is_inherit(triompher_get_theme_option('header_scheme')) 
													? triompher_get_theme_option('color_scheme') 
													: triompher_get_theme_option('header_scheme'));
					?>"><?php

	// Background video
	if (!empty($triompher_header_video)) {
		get_template_part( 'templates/header-video' );
	}
	
	// Main menu
	if (triompher_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>