<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( !function_exists( 'triompher_wp_gdpr_compliance_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'triompher_wp_gdpr_compliance_theme_setup9', 9 );
	function triompher_wp_gdpr_compliance_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'triompher_filter_tgmpa_required_plugins', 'triompher_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	function triompher_wp_gdpr_compliance_tgmpa_required_plugins($list=array()) {
		if (in_array('wp-gdpr-compliance', triompher_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('Cookie Information', 'triompher'),
				'slug' 		=> 'wp-gdpr-compliance',
				'required' 	=> false
			);
		return $list;
	}
}

// Check if this plugin installed and activated
if ( !function_exists( 'triompher_exists_wp_gdpr_compliance' ) ) {
	function triompher_exists_wp_gdpr_compliance() {
		return defined( 'WP_GDPR_C_ROOT_FILE' ) || defined( 'WPGDPRC_ROOT_FILE' );
	}
}
