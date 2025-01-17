<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.14
 */
$triompher_header_video = triompher_get_header_video();
$triompher_embed_video = '';
if (!empty($triompher_header_video) && !triompher_is_from_uploads($triompher_header_video)) {
	if (triompher_is_youtube_url($triompher_header_video) && preg_match('/[=\/]([^=\/]*)$/', $triompher_header_video, $matches) && !empty($matches[1])) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr($matches[1]); ?>"></div><?php
	} else {
		global $wp_embed;
		if (false && is_object($wp_embed)) {
			$triompher_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($triompher_header_video) . '[/embed]' ));
			$triompher_embed_video = triompher_make_video_autoplay($triompher_embed_video);
		} else {
			$triompher_header_video = str_replace('/watch?v=', '/embed/', $triompher_header_video);
			$triompher_header_video = triompher_add_to_url($triompher_header_video, array(
				'feature' => 'oembed',
				'controls' => 0,
				'autoplay' => 1,
				'showinfo' => 0,
				'modestbranding' => 1,
				'wmode' => 'transparent',
				'enablejsapi' => 1,
				'origin' => home_url(),
				'widgetid' => 1
			));
			$triompher_embed_video = '<iframe src="' . esc_url($triompher_header_video) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?><div id="background_video"><?php triompher_show_layout($triompher_embed_video); ?></div><?php
	}
}
?>