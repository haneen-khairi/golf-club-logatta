<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.10
 */

// Footer menu
$triompher_menu_footer = triompher_get_nav_menu(array(
											'location' => 'menu_footer',
											'class' => 'sc_layouts_menu sc_layouts_menu_default'
											));
if (!empty($triompher_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php triompher_show_layout($triompher_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>