<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

						// Widgets area inside page content
						triompher_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					triompher_create_widgets_area('widgets_below_page');

					$triompher_body_style = triompher_get_theme_option('body_style');
					if ($triompher_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$triompher_footer_style = triompher_get_theme_option("footer_style");
			if (strpos($triompher_footer_style, 'footer-custom-')===0) $triompher_footer_style = 'footer-custom';
			get_template_part( "templates/{$triompher_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(triompher_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>