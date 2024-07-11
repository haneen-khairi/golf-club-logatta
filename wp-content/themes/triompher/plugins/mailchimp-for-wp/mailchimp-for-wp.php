<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('triompher_mailchimp_theme_setup9')) {
	add_action( 'after_setup_theme', 'triompher_mailchimp_theme_setup9', 9 );
	function triompher_mailchimp_theme_setup9() {
		if (triompher_exists_mailchimp()) {
			add_action( 'wp_enqueue_scripts',							'triompher_mailchimp_frontend_scripts', 1100 );
			add_filter( 'triompher_filter_merge_styles',					'triompher_mailchimp_merge_styles');
		}
		if (is_admin()) {
			add_filter( 'triompher_filter_tgmpa_required_plugins',		'triompher_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'triompher_exists_mailchimp' ) ) {
	function triompher_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_mailchimp_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_mailchimp_tgmpa_required_plugins');
	function triompher_mailchimp_tgmpa_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', triompher_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'triompher'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if ( !function_exists( 'triompher_mailchimp_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'triompher_mailchimp_frontend_scripts', 1100 );
	function triompher_mailchimp_frontend_scripts() {
		if (triompher_exists_mailchimp()) {
			if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('plugins/mailchimp-for-wp/mailchimp-for-wp.css')!='')
				wp_enqueue_style( 'triompher-mailchimp-for-wp',  triompher_get_file_url('plugins/mailchimp-for-wp/mailchimp-for-wp.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'triompher_mailchimp_merge_styles' ) ) {
	//Handler of the add_filter( 'triompher_filter_merge_styles', 'triompher_mailchimp_merge_styles');
	function triompher_mailchimp_merge_styles($list) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (triompher_exists_mailchimp()) { require_once TRIOMPHER_THEME_DIR . 'plugins/mailchimp-for-wp/mailchimp-for-wp.styles.php'; }
?>