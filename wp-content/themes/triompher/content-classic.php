<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_blog_style = explode('_', triompher_get_theme_option('blog_style'));
$triompher_columns = empty($triompher_blog_style[1]) ? 2 : max(2, $triompher_blog_style[1]);
$triompher_expanded = !triompher_sidebar_present() && triompher_is_on(triompher_get_theme_option('expand_content'));
$triompher_post_format = get_post_format();
$triompher_post_format = empty($triompher_post_format) ? 'standard' : str_replace('post-format-', '', $triompher_post_format);
$triompher_animation = triompher_get_theme_option('blog_animation');

?><div class="<?php echo esc_attr($triompher_blog_style[0]) == 'classic' ? 'column' : 'masonry_item masonry_item'; ?>-1_<?php echo esc_attr($triompher_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_format_'.esc_attr($triompher_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($triompher_columns)
					. ' post_layout_'.esc_attr($triompher_blog_style[0]) 
					. ' post_layout_'.esc_attr($triompher_blog_style[0]).'_'.esc_attr($triompher_columns)
					); ?>
	<?php echo (!triompher_is_off($triompher_animation) ? ' data-animation="'.esc_attr(triompher_get_animation_classes($triompher_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	triompher_show_post_featured( array( 'thumb_size' => triompher_get_thumb_size($triompher_blog_style[0] == 'classic'
													? (strpos(triompher_get_theme_option('body_style'), 'full')!==false 
															? ( $triompher_columns > 2 ? 'big' : 'huge' )
															: (	$triompher_columns > 2
																? ($triompher_expanded ? 'med' : 'small')
																: ($triompher_expanded ? 'big' : 'med')
																)
														)
													: (strpos(triompher_get_theme_option('body_style'), 'full')!==false 
															? ( $triompher_columns > 2 ? 'masonry-big' : 'full' )
															: (	$triompher_columns <= 2 && $triompher_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($triompher_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('triompher_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('triompher_action_before_post_meta');

			// Post meta
			triompher_show_post_meta(array(
					'categories' => true,
					'date' => true,
					'edit' => false,
					'seo' => false,
					'share' => false,
					'counters' => 'comments'	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$triompher_show_learn_more = false;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($triompher_post_format, array('link', 'aside', 'status'))) {
				the_content();
			} else if ($triompher_post_format == 'quote') {
				if (($quote = triompher_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))!='')
					triompher_show_layout(wpautop($quote));
				else
					the_excerpt();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($triompher_post_format, array('link', 'aside', 'status', 'quote'))) {
			triompher_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $triompher_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Learn More', 'triompher'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>