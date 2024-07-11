<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_post_format = get_post_format();
$triompher_post_format = empty($triompher_post_format) ? 'standard' : str_replace('post-format-', '', $triompher_post_format);
$triompher_animation = triompher_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($triompher_post_format) ); ?>
	<?php echo (!triompher_is_off($triompher_animation) ? ' data-animation="'.esc_attr(triompher_get_animation_classes($triompher_animation)).'"' : ''); ?>
	><div class="post_featured_block"><?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	triompher_show_post_featured(array( 'thumb_size' => triompher_get_thumb_size( strpos(triompher_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	// Post meta
	triompher_show_post_meta(array(
			'categories' => false,
			'date' => true,
			'edit' => false,
			'seo' => false,
			'share' => false,
			'counters' => ''	//comments,likes,views - comma separated in any combination
		)
	);?></div><?php

	// Title and post meta
	if (get_the_title() != '') {
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
				'date' => false,
				'edit' => false,
				'seo' => false,
				'share' => false,
				'counters' => 'comments'	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .post_header --><?php
	}
	
	// Post content
	?><div class="post_content entry-content"><?php
		if (triompher_get_theme_option('blog_content') == 'fullpost') {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'triompher' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'triompher' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$triompher_show_learn_more = !in_array($triompher_post_format, array('link', 'aside', 'status', 'quote'));

			// Post content area
			?><div class="post_content_inner"><?php
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
			?></div><?php
			// More button
			if ( $triompher_show_learn_more ) {
				?><p><a class="simple-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Learn More', 'triompher'); ?></a></p><?php
			}

		}
	?></div><!-- .entry-content -->
</article>