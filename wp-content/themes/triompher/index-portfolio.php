<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

triompher_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'masonry' );
wp_enqueue_script( 'classie', triompher_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'triompher-gallery-script', triompher_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$triompher_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$triompher_sticky_out = triompher_get_theme_option('sticky_style')=='columns' 
							&& is_array($triompher_stickies) && count($triompher_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$triompher_cat = triompher_get_theme_option('parent_cat');
	$triompher_post_type = triompher_get_theme_option('post_type');
	$triompher_taxonomy = triompher_get_post_type_taxonomy($triompher_post_type);
	$triompher_show_filters = triompher_get_theme_option('show_filters');
	$triompher_tabs = array();
	if (!triompher_is_off($triompher_show_filters)) {
		$triompher_args = array(
			'type'			=> $triompher_post_type,
			'child_of'		=> $triompher_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $triompher_taxonomy,
			'pad_counts'	=> false
		);
		$triompher_portfolio_list = get_terms($triompher_args);
		if (is_array($triompher_portfolio_list) && count($triompher_portfolio_list) > 0) {
			$triompher_tabs[$triompher_cat] = esc_html__('All', 'triompher');
			foreach ($triompher_portfolio_list as $triompher_term) {
				if (isset($triompher_term->term_id)) $triompher_tabs[$triompher_term->term_id] = $triompher_term->name;
			}
		}
	}
	if (count($triompher_tabs) > 0) {
		$triompher_portfolio_filters_ajax = true;
		$triompher_portfolio_filters_active = $triompher_cat;
		$triompher_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters triompher_tabs triompher_tabs_ajax">
			<ul class="portfolio_titles triompher_tabs_titles">
				<?php
				foreach ($triompher_tabs as $triompher_id=>$triompher_title) {
					?><li><a href="<?php echo esc_url(triompher_get_hash_link(sprintf('#%s_%s_content', $triompher_portfolio_filters_id, $triompher_id))); ?>" data-tab="<?php echo esc_attr($triompher_id); ?>"><?php echo esc_html($triompher_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$triompher_ppp = triompher_get_theme_option('posts_per_page');
			if (triompher_is_inherit($triompher_ppp)) $triompher_ppp = '';
			foreach ($triompher_tabs as $triompher_id=>$triompher_title) {
				$triompher_portfolio_need_content = $triompher_id==$triompher_portfolio_filters_active || !$triompher_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $triompher_portfolio_filters_id, $triompher_id)); ?>"
					class="portfolio_content triompher_tabs_content"
					data-blog-template="<?php echo esc_attr(triompher_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(triompher_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($triompher_ppp); ?>"
					data-post-type="<?php echo esc_attr($triompher_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($triompher_taxonomy); ?>"
					data-cat="<?php echo esc_attr($triompher_id); ?>"
					data-parent-cat="<?php echo esc_attr($triompher_cat); ?>"
					data-need-content="<?php echo (false===$triompher_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($triompher_portfolio_need_content) 
						triompher_show_portfolio_posts(array(
							'cat' => $triompher_id,
							'parent_cat' => $triompher_cat,
							'taxonomy' => $triompher_taxonomy,
							'post_type' => $triompher_post_type,
							'page' => 1,
							'sticky' => $triompher_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		triompher_show_portfolio_posts(array(
			'cat' => $triompher_cat,
			'parent_cat' => $triompher_cat,
			'taxonomy' => $triompher_taxonomy,
			'post_type' => $triompher_post_type,
			'page' => 1,
			'sticky' => $triompher_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>