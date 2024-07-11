<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */

// Logo
if (triompher_is_on(triompher_get_theme_option('logo_in_footer'))) {
	$triompher_logo_image = '';
	if (triompher_get_retina_multiplier(2) > 1)
		$triompher_logo_image = triompher_get_theme_option( 'logo_footer_retina' );
	if (empty($triompher_logo_image)) 
		$triompher_logo_image = triompher_get_theme_option( 'logo_footer' );
	$triompher_logo_text   = get_bloginfo( 'name' );
	if (!empty($triompher_logo_image) || !empty($triompher_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($triompher_logo_image)) {
					$triompher_attr = triompher_getimagesize($triompher_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($triompher_logo_image).'" class="logo_footer_image" alt="'.esc_attr__('Logo', 'triompher').'"'.(!empty($triompher_attr[3]) ? sprintf(' %s', $triompher_attr[3]) : '').'></a>' ;
				} else if (!empty($triompher_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($triompher_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>