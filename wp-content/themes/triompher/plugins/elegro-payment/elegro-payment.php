<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'triompher_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'triompher_elegro_payment_theme_setup9', 9 );
	function triompher_elegro_payment_theme_setup9() {
		if (triompher_exists_elegro_payment()) {
			add_action( 'wp_enqueue_scripts', 							'triompher_elegro_payment_frontend_scripts', 1100 );
			add_filter( 'triompher_filter_merge_styles',					'triompher_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'triompher_filter_tgmpa_required_plugins', 'triompher_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_elegro_payment_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_elegro_payment_tgmpa_required_plugins');
	function triompher_elegro_payment_tgmpa_required_plugins($list=array()) {
		if (in_array('elegro-payment', triompher_storage_get('required_plugins'))) {
			$list[] = array(
				'name' 		=> esc_html__('elegro Crypto Payment', 'triompher'),
				'slug' 		=> 'elegro-payment',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'triompher_exists_elegro_payment' ) ) {
	function triompher_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}

// Enqueue plugin's custom styles
if ( !function_exists( 'triompher_elegro_payment_frontend_scripts' ) ) {
	function triompher_elegro_payment_frontend_scripts() {
		if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('plugins/elegro-payment/elegro-payment.css')!='')
			wp_enqueue_style( 'triompher-elegro-payment',  triompher_get_file_url('plugins/elegro-payment/elegro-payment.css'), array(), null );
	}
}

// Merge custom styles
if ( !function_exists( 'triompher_elegro_payment_merge_styles' ) ) {
	//Handler of the add_filter('triompher_filter_merge_styles', 'triompher_elegro_payment_merge_styles');
	function triompher_elegro_payment_merge_styles($list) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}
?>