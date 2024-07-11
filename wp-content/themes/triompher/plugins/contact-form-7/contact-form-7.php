<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('triompher_cf7_theme_setup9')) {
	add_action( 'after_setup_theme', 'triompher_cf7_theme_setup9', 9 );
	function triompher_cf7_theme_setup9() {
		
		if (triompher_exists_cf7()) {
			add_action( 'wp_enqueue_scripts', 								'triompher_cf7_frontend_scripts', 1100 );
			add_filter( 'triompher_filter_merge_styles',						'triompher_cf7_merge_styles' );
			add_filter('wpcf7_autop_or_not', 'triompher_cf7_wpcf7_autop');
		}
		if (is_admin()) {
			add_filter( 'triompher_filter_tgmpa_required_plugins',			'triompher_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_cf7_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_cf7_tgmpa_required_plugins');
	function triompher_cf7_tgmpa_required_plugins($list=array()) {
		if (in_array('contact-form-7', triompher_storage_get('required_plugins'))) {
			// CF7 plugin
			$list[] = array(
					'name' 		=> esc_html__('Contact Form 7', 'triompher'),
					'slug' 		=> 'contact-form-7',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if cf7 installed and activated
if ( !function_exists( 'triompher_exists_cf7' ) ) {
	function triompher_exists_cf7() {
		return class_exists('WPCF7');
	}
}
	
// Enqueue custom styles
if ( !function_exists( 'triompher_cf7_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'triompher_cf7_frontend_scripts', 1100 );
	function triompher_cf7_frontend_scripts() {
		if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('plugins/contact-form-7/contact-form-7.css')!='')
			wp_enqueue_style( 'triompher-contact-form-7',  triompher_get_file_url('plugins/contact-form-7/contact-form-7.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'triompher_cf7_merge_styles' ) ) {
	//Handler of the add_filter('triompher_filter_merge_styles', 'triompher_cf7_merge_styles');
	function triompher_cf7_merge_styles($list) {
		$list[] = 'plugins/contact-form-7/contact-form-7.css';
		return $list;
	}
}

// Remove <p> and <br/> from Contact Form 7
if ( ! function_exists( 'triompher_cf7_wpcf7_autop' ) ) {
	function triompher_cf7_wpcf7_autop() {
		return false;
	}
}
?>