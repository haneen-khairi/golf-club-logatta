<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$triompher_content = '';
$triompher_blog_archive_mask = '%%CONTENT%%';
$triompher_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $triompher_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($triompher_content = apply_filters('the_content', get_the_content())) != '') {
		if (($triompher_pos = strpos($triompher_content, $triompher_blog_archive_mask)) !== false) {
			$triompher_content = preg_replace('/(\<p\>\s*)?'.$triompher_blog_archive_mask.'(\s*\<\/p\>)/i', $triompher_blog_archive_subst, $triompher_content);
		} else
			$triompher_content .= $triompher_blog_archive_subst;
		$triompher_content = explode($triompher_blog_archive_mask, $triompher_content);
		// Add VC custom styles to the inline CSS
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( !empty( $vc_custom_css ) ) triompher_add_inline_css(strip_tags($vc_custom_css));
	}
}

// Prepare args for a new query
$triompher_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$triompher_args = triompher_query_add_posts_and_cats($triompher_args, '', triompher_get_theme_option('post_type'), triompher_get_theme_option('parent_cat'));
$triompher_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($triompher_page_number > 1) {
	$triompher_args['paged'] = $triompher_page_number;
	$triompher_args['ignore_sticky_posts'] = true;
}
$triompher_ppp = triompher_get_theme_option('posts_per_page');
if ((int) $triompher_ppp != 0)
	$triompher_args['posts_per_page'] = (int) $triompher_ppp;
// Make a new query
query_posts( $triompher_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($triompher_content) && count($triompher_content) == 2) {
	set_query_var('blog_archive_start', $triompher_content[0]);
	set_query_var('blog_archive_end', $triompher_content[1]);
}

get_template_part('index');
?>