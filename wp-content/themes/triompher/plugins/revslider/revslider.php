<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('triompher_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'triompher_revslider_theme_setup9', 9 );
	function triompher_revslider_theme_setup9() {
		if (triompher_exists_revslider()) {
			add_action( 'wp_enqueue_scripts', 					'triompher_revslider_frontend_scripts', 1100 );
			add_filter( 'triompher_filter_merge_styles',			'triompher_revslider_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'triompher_filter_tgmpa_required_plugins','triompher_revslider_tgmpa_required_plugins' );
		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'triompher_exists_revslider' ) ) {
	function triompher_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_revslider_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_revslider_tgmpa_required_plugins');
	function triompher_revslider_tgmpa_required_plugins($list=array()) {
		if (in_array('revslider', triompher_storage_get('required_plugins'))) {
			$path = triompher_get_file_dir('plugins/revslider/revslider.zip');
			$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'triompher'),
					'slug' 		=> 'revslider',
					'version'	=> '6.6.14',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue custom styles
if ( !function_exists( 'triompher_revslider_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'triompher_revslider_frontend_scripts', 1100 );
	function triompher_revslider_frontend_scripts() {
		if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('plugins/revslider/revslider.css')!='')
			wp_enqueue_style( 'triompher-revslider',  triompher_get_file_url('plugins/revslider/revslider.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'triompher_revslider_merge_styles' ) ) {
	//Handler of the add_filter('triompher_filter_merge_styles', 'triompher_revslider_merge_styles');
	function triompher_revslider_merge_styles($list) {
		$list[] = 'plugins/revslider/revslider.css';
		return $list;
	}
}
?>