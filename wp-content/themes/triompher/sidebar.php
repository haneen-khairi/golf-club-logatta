<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_sidebar_position = triompher_get_theme_option('sidebar_position');
if (triompher_sidebar_present()) {
	ob_start();
	$triompher_sidebar_name = triompher_get_theme_option('sidebar_widgets');
	triompher_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($triompher_sidebar_name) ) {
		dynamic_sidebar($triompher_sidebar_name);
	}
	$triompher_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($triompher_out)) {
		?>
		<div class="sidebar <?php echo esc_attr($triompher_sidebar_position); ?> widget_area<?php if (!triompher_is_inherit(triompher_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(triompher_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'triompher_action_before_sidebar' );
				triompher_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $triompher_out));
				do_action( 'triompher_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>