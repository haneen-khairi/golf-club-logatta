<?php
/* Date & Time Picker support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'triompher_date_time_picker_field_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'triompher_date_time_picker_field_theme_setup9', 9 );
	function triompher_date_time_picker_field_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'triompher_filter_tgmpa_required_plugins', 'triompher_date_time_picker_field_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'triompher_date_time_picker_field_tgmpa_required_plugins' ) ) {
		//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_wp_gdpr_compliance_tgmpa_required_plugins');
		function triompher_date_time_picker_field_tgmpa_required_plugins( $list = array() ) {
			if (in_array('date-time-picker-field', triompher_storage_get('required_plugins'))) {
			$list[] = array(
				'name' 		=> esc_html__('Date Time Picker Field', 'triompher'),
				'slug'     => 'date-time-picker-field',
				'required' => false,
			);
		}
		return $list;
	}
}


// Check if this plugin installed and activated
if ( ! function_exists( 'triompher_exists_date_time_picker_field' ) ) {
	function triompher_exists_date_time_picker_field() {
		return class_exists( 'CMoreira\\Plugins\\DateTimePicker\\Init' );
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'triompher_date_time_picker_field_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options',	'triompher_date_time_picker_field_importer_set_options' );
	function triompher_date_time_picker_field_importer_set_options($options=array()) {
		if ( triompher_exists_date_time_picker_field() && in_array('date-time-picker-field', $options['required_plugins']) ) {
			if (is_array($options)) {
				$options['additional_options'][] = 'dtpicker';
			}
		}
		return $options;
	}
}
