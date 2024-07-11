<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */

// Footer sidebar
$triompher_footer_name = triompher_get_theme_option('footer_widgets');
$triompher_footer_present = !triompher_is_off($triompher_footer_name) && is_active_sidebar($triompher_footer_name);
if ($triompher_footer_present) { 
	triompher_storage_set('current_sidebar', 'footer');
	$triompher_footer_wide = triompher_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($triompher_footer_name) ) {
		dynamic_sidebar($triompher_footer_name);
	}
	$triompher_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($triompher_out)) {
		$triompher_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $triompher_out);
		$triompher_need_columns = true;	//or check: strpos($triompher_out, 'columns_wrap')===false;
		if ($triompher_need_columns) {
			$triompher_columns = max(0, (int) triompher_get_theme_option('footer_columns'));
			if ($triompher_columns == 0) $triompher_columns = min(4, max(1, substr_count($triompher_out, '<aside ')));
			if ($triompher_columns > 1)
				$triompher_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($triompher_columns).' widget ', $triompher_out);
			else
				$triompher_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($triompher_footer_wide) ? ' footer_fullwidth' : ''; ?> sc_layouts_row  sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$triompher_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($triompher_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'triompher_action_before_sidebar' );
				triompher_show_layout($triompher_out);
				do_action( 'triompher_action_after_sidebar' );
				if ($triompher_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$triompher_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>