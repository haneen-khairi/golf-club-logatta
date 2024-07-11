<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */

$triompher_footer_scheme =  triompher_is_inherit(triompher_get_theme_option('footer_scheme')) ? triompher_get_theme_option('color_scheme') : triompher_get_theme_option('footer_scheme');

$triompher_footer_id = str_replace('footer-custom-', '', triompher_get_theme_option("footer_style"));
if ((int) $triompher_footer_id == 0) {
	$triompher_footer_id = triompher_get_post_id(array(
			'name' => $triompher_footer_id,
			'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
		)
	);
} else {
	$triompher_footer_id = apply_filters('trx_addons_filter_get_translated_layout', $triompher_footer_id);
}

$triompher_footer_meta = get_post_meta($triompher_footer_id, 'trx_addons_options', true);
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($triompher_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($triompher_footer_id))); 
						if (!empty($triompher_footer_meta['margin']) != '') 
							echo ' '.esc_attr(triompher_add_inline_css_class('margin-top: '.esc_attr(triompher_prepare_css_value($triompher_footer_meta['margin'])).';'));
						?> scheme_<?php echo esc_attr($triompher_footer_scheme); 
						?>">
	<?php
    // Custom footer's layout
    do_action('triompher_action_show_layout', $triompher_footer_id);
	?>
</footer><!-- /.footer_wrap -->
