<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */

// Copyright area
$triompher_footer_scheme =  triompher_is_inherit(triompher_get_theme_option('footer_scheme')) ? triompher_get_theme_option('color_scheme') : triompher_get_theme_option('footer_scheme');
$triompher_copyright_scheme = triompher_is_inherit(triompher_get_theme_option('copyright_scheme')) ? $triompher_footer_scheme : triompher_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($triompher_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				$triompher_copyright = triompher_prepare_macros(triompher_get_theme_option('copyright'));
				if (!empty($triompher_copyright)) {
					triompher_show_layout(do_shortcode(str_replace(array('{{Y}}', '{Y}'), date('Y'), triompher_get_theme_option('copyright'))));
				}
				?></div>
		</div>
	</div>
</div>
