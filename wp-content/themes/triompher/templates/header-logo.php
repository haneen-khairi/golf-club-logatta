<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

$triompher_args = get_query_var('triompher_logo_args');

// Site logo
$triompher_logo_image  = triompher_get_logo_image(isset($triompher_args['type']) ? $triompher_args['type'] : '');
$triompher_logo_text   = triompher_is_on(triompher_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$triompher_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($triompher_logo_image) || !empty($triompher_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($triompher_logo_image)) {
			$triompher_attr = triompher_getimagesize($triompher_logo_image);
			echo '<img src="'.esc_url($triompher_logo_image).'" alt="'.esc_attr__('Logo', 'triompher').'"'.(!empty($triompher_attr[3]) ? sprintf(' %s', $triompher_attr[3]) : '').'>' ;
		} else {
			triompher_show_layout(triompher_prepare_macros($triompher_logo_text), '<span class="logo_text">', '</span>');
			triompher_show_layout(triompher_prepare_macros($triompher_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>