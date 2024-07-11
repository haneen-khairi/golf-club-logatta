<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

// Page (category, tag, archive, author) title

if ( triompher_need_page_title() ) {
	triompher_sc_layouts_showed('title', true);
	triompher_sc_layouts_showed('postmeta', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() )  {
							?><div class="sc_layouts_title_meta"><?php
								triompher_show_post_meta(array(
									'date' => true,
									'categories' => true,
									'seo' => true,
									'share' => false,
									'counters' => 'views,comments,likes'
									)
								);
							?></div><?php
						}
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$triompher_blog_title = triompher_get_blog_title();
							$triompher_blog_title_text = $triompher_blog_title_class = $triompher_blog_title_link = $triompher_blog_title_link_text = '';
							if (is_array($triompher_blog_title)) {
								$triompher_blog_title_text = $triompher_blog_title['text'];
								$triompher_blog_title_class = !empty($triompher_blog_title['class']) ? ' '.$triompher_blog_title['class'] : '';
								$triompher_blog_title_link = !empty($triompher_blog_title['link']) ? $triompher_blog_title['link'] : '';
								$triompher_blog_title_link_text = !empty($triompher_blog_title['link_text']) ? $triompher_blog_title['link_text'] : '';
							} else
								$triompher_blog_title_text = $triompher_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($triompher_blog_title_class); ?>"><?php
								$triompher_top_icon = triompher_get_category_icon();
								if (!empty($triompher_top_icon)) {
									$triompher_attr = triompher_getimagesize($triompher_top_icon);
									?><img src="<?php echo esc_url($triompher_top_icon); ?>" alt="'.esc_attr__('icon', 'triompher').'" <?php if (!empty($triompher_attr[3])) triompher_show_layout($triompher_attr[3]);?>><?php
								}
								echo wp_kses($triompher_blog_title_text, 'triompher_kses_content');
							?></h1>
							<?php
							if (!empty($triompher_blog_title_link) && !empty($triompher_blog_title_link_text)) {
								?><a href="<?php echo esc_url($triompher_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($triompher_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'triompher_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>