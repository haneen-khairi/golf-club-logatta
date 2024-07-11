<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.06
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

$triompher_header_id = str_replace('header-custom-', '', triompher_get_theme_option("header_style"));
if ((int) $triompher_header_id == 0) {
	$triompher_header_id = triompher_get_post_id(array(
			'name' => $triompher_header_id,
			'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
		)
	);
} else {
	$triompher_header_id = apply_filters('trx_addons_filter_get_translated_layout', $triompher_header_id);
}

$triompher_header_meta = get_post_meta($triompher_header_id, 'trx_addons_options', true);

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($triompher_header_id); 
						?> top_panel_custom_<?php echo esc_attr(sanitize_title(get_the_title($triompher_header_id)));
						echo !empty($triompher_header_image) || !empty($triompher_header_video) 
							? ' with_bg_image' 
							: ' without_bg_image';
						if ($triompher_header_video!='') 
							echo ' with_bg_video';
						if ($triompher_header_image!='')
							echo ' '.esc_attr(triompher_add_inline_css_class('background-image: url('.esc_url($triompher_header_image).');'));
						if (!empty($triompher_header_meta['margin']) != '') 
							echo ' '.esc_attr(triompher_add_inline_css_class('margin-bottom: '.esc_attr(triompher_prepare_css_value($triompher_header_meta['margin'])).';'));
						if (is_single() && has_post_thumbnail()) 
							echo ' with_featured_image';
						if (triompher_is_on(triompher_get_theme_option('header_fullheight'))) 
							echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(triompher_is_inherit(triompher_get_theme_option('header_scheme')) 
														? triompher_get_theme_option('color_scheme') 
														: triompher_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($triompher_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('triompher_action_show_layout', $triompher_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );
		
?></header>