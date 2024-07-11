<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

// Header sidebar
$triompher_header_name = triompher_get_theme_option('header_widgets');
$triompher_header_present = !triompher_is_off($triompher_header_name) && is_active_sidebar($triompher_header_name);
if ($triompher_header_present) { 
	triompher_storage_set('current_sidebar', 'header');
	$triompher_header_wide = triompher_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($triompher_header_name) ) {
		dynamic_sidebar($triompher_header_name);
	}
	$triompher_widgets_output = ob_get_contents();
	ob_end_clean();
	if (!empty($triompher_widgets_output)) {
		$triompher_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $triompher_widgets_output);
		$triompher_need_columns = strpos($triompher_widgets_output, 'columns_wrap')===false;
		if ($triompher_need_columns) {
			$triompher_columns = max(0, (int) triompher_get_theme_option('header_columns'));
			if ($triompher_columns == 0) $triompher_columns = min(6, max(1, substr_count($triompher_widgets_output, '<aside ')));
			if ($triompher_columns > 1)
				$triompher_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($triompher_columns).' widget ', $triompher_widgets_output);
			else
				$triompher_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($triompher_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$triompher_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($triompher_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'triompher_action_before_sidebar' );
				triompher_show_layout($triompher_widgets_output);
				do_action( 'triompher_action_after_sidebar' );
				if ($triompher_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$triompher_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>