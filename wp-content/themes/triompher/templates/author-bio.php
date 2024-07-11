<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$triompher_mult = triompher_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120*$triompher_mult ); 
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<div><?php esc_html_e('About Author', 'triompher'); ?></div>

		<h5 class="author_title" itemprop="name"><?php echo wp_kses_data(sprintf(__('About %s', 'triompher'), '<span class="fn">'.get_the_author().'</span>')); ?></h5>

		<div class="author_bio" itemprop="description">
			<?php echo wp_kses(wpautop(get_the_author_meta( 'description' )), 'triompher_kses_content' ); ?>

			<?php do_action('triompher_action_user_meta'); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
