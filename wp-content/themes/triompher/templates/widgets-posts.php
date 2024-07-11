<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_post_id    = get_the_ID();
$triompher_post_date  = triompher_get_date();
$triompher_post_title = get_the_title();
$triompher_post_link  = get_permalink();
$triompher_post_author_id   = get_the_author_meta('ID');
$triompher_post_author_name = get_the_author_meta('display_name');
$triompher_post_author_url  = get_author_posts_url($triompher_post_author_id, '');

$triompher_args = get_query_var('triompher_args_widgets_posts');
$triompher_show_date = isset($triompher_args['show_date']) ? (int) $triompher_args['show_date'] : 1;
$triompher_show_image = isset($triompher_args['show_image']) ? (int) $triompher_args['show_image'] : 1;
$triompher_show_author = isset($triompher_args['show_author']) ? (int) $triompher_args['show_author'] : 1;
$triompher_show_counters = isset($triompher_args['show_counters']) ? (int) $triompher_args['show_counters'] : 1;
$triompher_show_categories = isset($triompher_args['show_categories']) ? (int) $triompher_args['show_categories'] : 1;

$triompher_output = triompher_storage_get('triompher_output_widgets_posts');

$triompher_post_counters_output = '';
if ( $triompher_show_counters ) {
	$triompher_post_counters_output = '<span class="post_info_item post_info_counters">'
								. triompher_get_post_counters('comments')
							. '</span>';
}


$triompher_output .= '<article class="post_item with_thumb">';

if ($triompher_show_image) {
	$triompher_post_thumb = get_the_post_thumbnail($triompher_post_id, triompher_get_thumb_size('tiny'), array(
		'alt' => the_title_attribute( array( 'echo' => false ) )
	));
	if ($triompher_post_thumb) $triompher_output .= '<div class="post_thumb">' . ($triompher_post_link ? '<a href="' . esc_url($triompher_post_link) . '">' : '') . ($triompher_post_thumb) . ($triompher_post_link ? '</a>' : '') . '</div>';
}

$triompher_output .= '<div class="post_content">'
			. ($triompher_show_categories 
					? '<div class="post_categories">'
						. triompher_get_post_categories()
						. $triompher_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($triompher_post_link ? '<a href="' . esc_url($triompher_post_link) . '">' : '') . ($triompher_post_title) . ($triompher_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('triompher_filter_get_post_info', 
								'<div class="post_info">'
									. ($triompher_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($triompher_post_link ? '<a href="' . esc_url($triompher_post_link) . '" class="post_info_date">' : '') 
											. esc_html($triompher_post_date) 
											. ($triompher_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($triompher_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'triompher') . ' ' 
											. ($triompher_post_link ? '<a href="' . esc_url($triompher_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($triompher_post_author_name) 
											. ($triompher_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$triompher_show_categories && $triompher_post_counters_output
										? $triompher_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
triompher_storage_set('triompher_output_widgets_posts', $triompher_output);
?>