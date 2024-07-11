<?php
/* WPBakery Page Builder support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('triompher_vc_theme_setup9')) {
	add_action( 'after_setup_theme', 'triompher_vc_theme_setup9', 9 );
	function triompher_vc_theme_setup9() {
		if (triompher_exists_visual_composer()) {
			add_action( 'wp_enqueue_scripts', 								'triompher_vc_frontend_scripts', 1100 );
			add_filter( 'triompher_filter_merge_styles',						'triompher_vc_merge_styles' );
	
			// Add/Remove params in the standard VC shortcodes
			//-----------------------------------------------------
			add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,					'triompher_vc_add_params_classes', 10, 3 );
			
			// Color scheme
			$scheme = array(
				"param_name" => "scheme",
				"heading" => esc_html__("Color scheme", 'triompher'),
				"description" => wp_kses_data( __("Select color scheme to decorate this block", 'triompher') ),
				"group" => esc_html__('Colors', 'triompher'),
				"admin_label" => true,
				"value" => array_flip(triompher_get_list_schemes(true)),
				"type" => "dropdown"
			);
			vc_add_param("vc_section", $scheme);
			vc_add_param("vc_row", $scheme);
			vc_add_param("vc_row_inner", $scheme);
			vc_add_param("vc_column", $scheme);
			vc_add_param("vc_column_inner", $scheme);
			vc_add_param("vc_column_text", $scheme);
			
			// Alter height and hide on mobile for Empty Space
			vc_add_param("vc_empty_space", array(
				"param_name" => "alter_height",
				"heading" => esc_html__("Alter height", 'triompher'),
				"description" => wp_kses_data( __("Select alternative height instead value from the field above", 'triompher') ),
				"admin_label" => true,
				"value" => array(
					esc_html__('Tiny', 'triompher') => 'tiny',
					esc_html__('Small', 'triompher') => 'small',
					esc_html__('Medium', 'triompher') => 'medium',
					esc_html__('Large', 'triompher') => 'large',
					esc_html__('Huge', 'triompher') => 'huge',
					esc_html__('From the value above', 'triompher') => 'none'
				),
				"type" => "dropdown"
			));
			vc_add_param("vc_empty_space", array(
				"param_name" => "hide_on_mobile",
				"heading" => esc_html__("Hide on mobile", 'triompher'),
				"description" => wp_kses_data( __("Hide this block on the mobile devices, when the columns are arranged one under another", 'triompher') ),
				"admin_label" => true,
				"std" => 0,
				"value" => array(
					esc_html__("Hide on mobile", 'triompher') => "1",
					esc_html__("Hide on tablet", 'triompher') => "3",
					esc_html__("Hide on notebook", 'triompher') => "2" 
					),
				"type" => "checkbox"
			));
			
			// Add Narrow style to the Progress bars
			vc_add_param("vc_progress_bar", array(
				"param_name" => "narrow",
				"heading" => esc_html__("Narrow", 'triompher'),
				"description" => wp_kses_data( __("Use narrow style for the progress bar", 'triompher') ),
				"std" => 0,
				"value" => array(esc_html__("Narrow style", 'triompher') => "1" ),
				"type" => "checkbox"
			));
			
			// Add param 'Closeable' to the Message Box
			vc_add_param("vc_message", array(
				"param_name" => "closeable",
				"heading" => esc_html__("Closeable", 'triompher'),
				"description" => wp_kses_data( __("Add 'Close' button to the message box", 'triompher') ),
				"std" => 0,
				"value" => array(esc_html__("Closeable", 'triompher') => "1" ),
				"type" => "checkbox"
			));
		}
		if (is_admin()) {
			add_filter( 'triompher_filter_tgmpa_required_plugins',		'triompher_vc_tgmpa_required_plugins' );
			add_filter( 'vc_iconpicker-type-fontawesome',				'triompher_vc_iconpicker_type_fontawesome' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'triompher_vc_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('triompher_filter_tgmpa_required_plugins',	'triompher_vc_tgmpa_required_plugins');
	function triompher_vc_tgmpa_required_plugins($list=array()) {
		if (in_array('js_composer', triompher_storage_get('required_plugins'))) {
			$path = triompher_get_file_dir('plugins/js_composer/js_composer.zip');
			$list[] = array(
					'name' 		=> esc_html__('WPBakery Page Builder', 'triompher'),
					'slug' 		=> 'js_composer',
					'version'	=> '6.13.0',
					'source'	=> !empty($path) ? $path : 'upload://js_composer.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if WPBakery Page Builder installed and activated
if ( !function_exists( 'triompher_exists_visual_composer' ) ) {
	function triompher_exists_visual_composer() {
		return class_exists('Vc_Manager');
	}
}

// Check if WPBakery Page Builder in frontend editor mode
if ( !function_exists( 'triompher_vc_is_frontend' ) ) {
	function triompher_vc_is_frontend() {
		return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
			|| (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');
	}
}
	
// Enqueue VC custom styles
if ( !function_exists( 'triompher_vc_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'triompher_vc_frontend_scripts', 1100 );
	function triompher_vc_frontend_scripts() {
		if (triompher_exists_visual_composer()) {
			if (triompher_is_on(triompher_get_theme_option('debug_mode')) && triompher_get_file_dir('plugins/js_composer/js_composer.css')!='')
				wp_enqueue_style( 'triompher-js-composer',  triompher_get_file_url('plugins/js_composer/js_composer.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'triompher_vc_merge_styles' ) ) {
	//Handler of the add_filter('triompher_filter_merge_styles', 'triompher_vc_merge_styles');
	function triompher_vc_merge_styles($list) {
		$list[] = 'plugins/js_composer/js_composer.css';
		return $list;
	}
}
	
// Add theme icons into VC iconpicker list
if ( !function_exists( 'triompher_vc_iconpicker_type_fontawesome' ) ) {
	//Handler of the add_filter( 'vc_iconpicker-type-fontawesome',	'triompher_vc_iconpicker_type_fontawesome' );
	function triompher_vc_iconpicker_type_fontawesome($icons) {
		$list = triompher_get_list_icons();
		if (!is_array($list) || count($list) == 0) return $icons;
		$rez = array();
		foreach ($list as $icon)
			$rez[] = array($icon => str_replace('icon-', '', $icon));
		return array_merge( $icons, array(esc_html__('Theme Icons', 'triompher') => $rez) );
	}
}



// Shortcodes
//------------------------------------------------------------------------

// Add params to the standard VC shortcodes
if ( !function_exists( 'triompher_vc_add_params_classes' ) ) {
	//Handler of the add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'triompher_vc_add_params_classes', 10, 3 );
	function triompher_vc_add_params_classes($classes, $sc, $atts) {
		if (in_array($sc, array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text'))) {
			if (!empty($atts['scheme']) && !triompher_is_inherit($atts['scheme']))
				$classes .= ($classes ? ' ' : '') . 'scheme_' . $atts['scheme'];
		} else if (in_array($sc, array('vc_empty_space'))) {
			if (!empty($atts['alter_height']) && !triompher_is_off($atts['alter_height']))
				$classes .= ($classes ? ' ' : '') . 'height_' . $atts['alter_height'];
			if (!empty($atts['hide_on_mobile'])) {
				if (strpos($atts['hide_on_mobile'], '1')!==false)	$classes .= ($classes ? ' ' : '') . 'hide_on_mobile';
				if (strpos($atts['hide_on_mobile'], '2')!==false)	$classes .= ($classes ? ' ' : '') . 'hide_on_notebook';
				if (strpos($atts['hide_on_mobile'], '3')!==false)	$classes .= ($classes ? ' ' : '') . 'hide_on_tablet';
			}
		} else if (in_array($sc, array('vc_progress_bar'))) {
			if (!empty($atts['narrow']) && (int) $atts['narrow']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_progress_bar_narrow';
		} else if (in_array($sc, array('vc_message'))) {
			if (!empty($atts['closeable']) && (int) $atts['closeable']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_message_box_closeable';
		}
		return $classes;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (triompher_exists_visual_composer()) { require_once TRIOMPHER_THEME_DIR . 'plugins/js_composer/js_composer.styles.php'; }
?>