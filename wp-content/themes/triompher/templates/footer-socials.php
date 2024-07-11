<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */


// Socials
if ( triompher_is_on(triompher_get_theme_option('socials_in_footer')) && ($triompher_output = triompher_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php triompher_show_layout($triompher_output); ?>
		</div>
	</div>
	<?php
}
?>