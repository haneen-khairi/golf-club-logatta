<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0.22
 */

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
if ( !function_exists('triompher_customizer_theme_setup1') ) {
	add_action( 'after_setup_theme', 'triompher_customizer_theme_setup1', 1 );
	function triompher_customizer_theme_setup1() {
		
		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		triompher_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Source Sans Pro',
				'family' => 'sans-serif',
				'styles' => '400,700'		// Parameter 'style' used only for the Google fonts
				),
			array(
				'name'	 => 'Playfair Display',
				'family' => 'sans-serif',
				'styles' => '400,400i,700,700i,900,900i'		// Parameter 'style' used only for the Google fonts
			),
			array(
				'name'	 => 'Oswald',
				'family' => 'sans-serif',
				'styles' => '400,500'		// Parameter 'style' used only for the Google fonts
			)
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		triompher_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		triompher_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'triompher'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'triompher'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.471rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.4em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '3.529rem',
				'font-weight'		=> '700',
				'font-style'		=> 'italic',
				'line-height'		=> '4.235rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '0.9583em',
				'margin-bottom'		=> '0.5433em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '2.824rem',
				'font-weight'		=> '700',
				'font-style'		=> 'italic',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '2.7em',
				'margin-bottom'		=> '0.8em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '2.118rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '2.824rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '3.52em',
				'margin-bottom'		=> '0.65em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '1.765rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '2.294rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '4.3em',
				'margin-bottom'		=> '0.543em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '1.412rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.765rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '5.5em',
				'margin-bottom'		=> '0.85em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'triompher'),
				'font-family'		=> 'Oswald, sans-serif',
				'font-size' 		=> '1.059rem',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.412rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '7.5176em',
				'margin-bottom'		=> '1.1412em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'triompher'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'triompher'),
				'font-family'		=> 'Playfair Display, sans-serif',
				'font-size' 		=> '2.1em',
				'font-weight'		=> '800',
				'font-style'		=> 'normal',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '1px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'triompher'),
				'font-family'		=> 'Oswald, sans-serif',
				'font-size' 		=> '16px',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.4px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'triompher'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'triompher'),
				'font-family'		=> 'Oswald, sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.529rem',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'triompher'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'triompher'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '14px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0.4px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'triompher'),
				'description'		=> esc_html__('Font settings of the main menu items', 'triompher'),
				'font-family'		=> 'Oswald, sans-serif',
				'font-size' 		=> '16px',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'triompher'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'triompher'),
				'font-family'		=> 'Oswald, sans-serif',
				'font-size' 		=> '16px',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		triompher_storage_set('scheme_color_groups', array(
			'main'	=> array(
							'title'			=> esc_html__('Main', 'triompher'),
							'description'	=> esc_html__('Colors of the main content area', 'triompher')
							),
			'alter'	=> array(
							'title'			=> esc_html__('Alter', 'triompher'),
							'description'	=> esc_html__('Colors of the alternative blocks (sidebars, etc.)', 'triompher')
							),
			'extra'	=> array(
							'title'			=> esc_html__('Extra', 'triompher'),
							'description'	=> esc_html__('Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'triompher')
							),
			'inverse' => array(
							'title'			=> esc_html__('Inverse', 'triompher'),
							'description'	=> esc_html__('Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'triompher')
							),
			'input'	=> array(
							'title'			=> esc_html__('Input', 'triompher'),
							'description'	=> esc_html__('Colors of the form fields (text field, textarea, select, etc.)', 'triompher')
							),
			)
		);
		triompher_storage_set('scheme_color_names', array(
			'bg_color'	=> array(
							'title'			=> esc_html__('Background color', 'triompher'),
							'description'	=> esc_html__('Background color of this block in the normal state', 'triompher')
							),
			'bg_hover'	=> array(
							'title'			=> esc_html__('Background hover', 'triompher'),
							'description'	=> esc_html__('Background color of this block in the hovered state', 'triompher')
							),
			'bd_color'	=> array(
							'title'			=> esc_html__('Border color', 'triompher'),
							'description'	=> esc_html__('Border color of this block in the normal state', 'triompher')
							),
			'bd_hover'	=>  array(
							'title'			=> esc_html__('Border hover', 'triompher'),
							'description'	=> esc_html__('Border color of this block in the hovered state', 'triompher')
							),
			'text'		=> array(
							'title'			=> esc_html__('Text', 'triompher'),
							'description'	=> esc_html__('Color of the plain text inside this block', 'triompher')
							),
			'text_dark'	=> array(
							'title'			=> esc_html__('Text dark', 'triompher'),
							'description'	=> esc_html__('Color of the dark text (bold, header, etc.) inside this block', 'triompher')
							),
			'text_light'=> array(
							'title'			=> esc_html__('Text light', 'triompher'),
							'description'	=> esc_html__('Color of the light text (post meta, etc.) inside this block', 'triompher')
							),
			'text_link'	=> array(
							'title'			=> esc_html__('Link', 'triompher'),
							'description'	=> esc_html__('Color of the links inside this block', 'triompher')
							),
			'text_hover'=> array(
							'title'			=> esc_html__('Link hover', 'triompher'),
							'description'	=> esc_html__('Color of the hovered state of links inside this block', 'triompher')
							),
			'text_link2'=> array(
							'title'			=> esc_html__('Link 2', 'triompher'),
							'description'	=> esc_html__('Color of the accented texts (areas) inside this block', 'triompher')
							),
			'text_hover2'=> array(
							'title'			=> esc_html__('Link 2 hover', 'triompher'),
							'description'	=> esc_html__('Color of the hovered state of accented texts (areas) inside this block', 'triompher')
							),
			'text_link3'=> array(
							'title'			=> esc_html__('Link 3', 'triompher'),
							'description'	=> esc_html__('Color of the other accented texts (buttons) inside this block', 'triompher')
							),
			'text_hover3'=> array(
							'title'			=> esc_html__('Link 3 hover', 'triompher'),
							'description'	=> esc_html__('Color of the hovered state of other accented texts (buttons) inside this block', 'triompher')
							)
			)
		);
		triompher_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'triompher'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#ffffff',
					'bd_color'			=> '#e7e3d8',
		
					// Text and links colors
					'text'				=> '#777777',
					'text_light'		=> '#989ea1',
					'text_dark'			=> '#353535',
					'text_link'			=> '#cca643',
					'text_hover'		=> '#839f92',
					'text_link2'		=> '#dcb95f',
					'text_hover2'		=> '#85a093',
					'text_link3'		=> '#cca643',
					'text_hover3'		=> '#85a093',
		
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#f8f4ea',
					'alter_bg_hover'	=> '#2e2c2c',
					'alter_bd_color'	=> '#ece7dc',
					'alter_bd_hover'	=> '#dadada',
					'alter_text'		=> '#a5a5a5',
					'alter_light'		=> '#9d9b9c',
					'alter_dark'		=> '#3a3737',
					'alter_link'		=> '#85a093',
					'alter_hover'		=> '#72cfd5',
					'alter_link2'		=> '#cca643',
					'alter_hover2'		=> '#8be77c',
					'alter_link3'		=> '#353535',
					'alter_hover3'		=> '#eec432',
		
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#f3d564',
					'extra_bg_hover'	=> '#7f998d',
					'extra_bd_color'	=> '#ffffff',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#828282',
					'extra_light'		=> '#818181',
					'extra_dark'		=> '#897b47',
					'extra_link'		=> '#ffffff',
					'extra_hover'		=> '#fe7259',
					'extra_link2'		=> '#69645a',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#f3f3f3',
					'extra_hover3'		=> '#eec432',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#eff6f3',
					'input_bg_hover'	=> '#eff6f3',
					'input_bd_color'	=> '#eff6f3',
					'input_bd_hover'	=> '#b2bfb9',
					'input_text'		=> '#353535',
					'input_light'		=> '#e9e4d7',
					'input_dark'		=> '#7b7974',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#3a3737',
					'inverse_bd_hover'	=> '#5aa4a9',
					'inverse_text'		=> '#1d1d1d',
					'inverse_light'		=> '#434242',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			),
		
			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'triompher'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#3a3737',
					'bd_color'			=> '#1c1b1f',
		
					// Text and links colors
					'text'				=> '#ffffff',
					'text_light'		=> '#5f5f5f',
					'text_dark'			=> '#ffffff',
					'text_link'			=> '#85a093',
					'text_hover'		=> '#ffaa5f',
					'text_link2'		=> '#80d572',
					'text_hover2'		=> '#cca643',
					'text_link3'		=> '#d7b15e',
					'text_hover3'		=> '#85a093',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#1e1d22',
					'alter_bg_hover'	=> '#989ea1',
					'alter_bd_color'	=> '#313131',
					'alter_bd_hover'	=> '#3d3d3d',
					'alter_text'		=> '#a5a5a5',
					'alter_light'		=> '#9d9b9c',
					'alter_dark'		=> '#ffffff',
					'alter_link'		=> '#85a093',
					'alter_hover'		=> '#fe7259',
					'alter_link2'		=> '#cca643',
					'alter_hover2'		=> '#8be77c',
					'alter_link3'		=> '#353535',
					'alter_hover3'		=> '#eec432',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#f3d564',
					'extra_bg_hover'	=> '#28272e',
					'extra_bd_color'	=> '#313131',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#a6a6a6',
					'extra_light'		=> '#5f5f5f',
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffaa5f',
					'extra_hover'		=> '#fe7259',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ffffff',
					'extra_hover3'		=> '#eec432',

					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#eff6f3',
					'input_bg_hover'	=> '#eff6f3',
					'input_bd_color'	=> '#eff6f3',
					'input_bd_hover'	=> '#353535',
					'input_text'		=> '#494747',
					'input_light'		=> '#5f5f5f',
					'input_dark'		=> '#353535',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#3a3737',
					'inverse_bd_hover'	=> '#cb5b47',
					'inverse_text'		=> '#1d1d1d',
					'inverse_light'		=> '#ffffff',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			)
		
		));
	}
}

			
// Additional (calculated) theme-specific colors
// Attention! Don't forget setup custom colors also in the theme.customizer.color-scheme.js
if (!function_exists('triompher_customizer_add_theme_colors')) {
	function triompher_customizer_add_theme_colors($colors) {
		if (substr($colors['text'], 0, 1) == '#') {
			$colors['bg_color_0']  = triompher_hex2rgba( $colors['bg_color'], 0 );
			$colors['bg_color_02']  = triompher_hex2rgba( $colors['bg_color'], 0.2 );
			$colors['bg_color_07']  = triompher_hex2rgba( $colors['bg_color'], 0.7 );
			$colors['bg_color_08']  = triompher_hex2rgba( $colors['bg_color'], 0.8 );
			$colors['bg_color_09']  = triompher_hex2rgba( $colors['bg_color'], 0.9 );
			$colors['alter_bg_color_07']  = triompher_hex2rgba( $colors['alter_bg_color'], 0.7 );
			$colors['alter_bg_color_04']  = triompher_hex2rgba( $colors['alter_bg_color'], 0.4 );
			$colors['alter_bg_color_02']  = triompher_hex2rgba( $colors['alter_bg_color'], 0.2 );
			$colors['alter_bd_color_02']  = triompher_hex2rgba( $colors['alter_bd_color'], 0.2 );
			$colors['extra_bg_color_07']  = triompher_hex2rgba( $colors['extra_bg_color'], 0.7 );
			$colors['extra_link3_02']  = triompher_hex2rgba( $colors['extra_link3'], 0.2 );
			$colors['text_dark_07']  = triompher_hex2rgba( $colors['text_dark'], 0.7 );
			$colors['text_dark_06']  = triompher_hex2rgba( $colors['text_dark'], 0.6 );
			$colors['text_dark_03']  = triompher_hex2rgba( $colors['text_dark'], 0.3 );
			$colors['text_link_02']  = triompher_hex2rgba( $colors['text_link'], 0.2 );
			$colors['text_link_07']  = triompher_hex2rgba( $colors['text_link'], 0.7 );
			$colors['inverse_bd_color_06']  = triompher_hex2rgba( $colors['inverse_bd_color'], 0.6 );
			$colors['text_link_blend'] = triompher_hsb2hex(triompher_hex2hsb( $colors['text_link'], 2, -5, 5 ));
			$colors['alter_link_blend'] = triompher_hsb2hex(triompher_hex2hsb( $colors['alter_link'], 2, -5, 5 ));
		} else {
			$colors['bg_color_0'] = '{{ data.bg_color_0 }}';
			$colors['bg_color_02'] = '{{ data.bg_color_02 }}';
			$colors['bg_color_07'] = '{{ data.bg_color_07 }}';
			$colors['bg_color_08'] = '{{ data.bg_color_08 }}';
			$colors['bg_color_09'] = '{{ data.bg_color_09 }}';
			$colors['alter_bg_color_07'] = '{{ data.alter_bg_color_07 }}';
			$colors['alter_bg_color_04'] = '{{ data.alter_bg_color_04 }}';
			$colors['alter_bg_color_02'] = '{{ data.alter_bg_color_02 }}';
			$colors['alter_bd_color_02'] = '{{ data.alter_bd_color_02 }}';
			$colors['extra_bg_color_07'] = '{{ data.extra_bg_color_07 }}';
			$colors['extra_link3_02'] = '{{ data.extra_link3_02 }}';
			$colors['text_dark_07'] = '{{ data.text_dark_07 }}';
			$colors['text_dark_06'] = '{{ data.text_dark_06 }}';
			$colors['text_dark_03'] = '{{ data.text_dark_03 }}';
			$colors['text_link_02'] = '{{ data.text_link_02 }}';
			$colors['text_link_07'] = '{{ data.text_link_07 }}';
			$colors['inverse_bd_color_06'] = '{{ data.inverse_bd_color_06 }}';
			$colors['text_link_blend'] = '{{ data.text_link_blend }}';
			$colors['alter_link_blend'] = '{{ data.alter_link_blend }}';
		}
		return $colors;
	}
}


			
// Additional theme-specific fonts rules
// Attention! Don't forget setup fonts rules also in the theme.customizer.color-scheme.js
if (!function_exists('triompher_customizer_add_theme_fonts')) {
	function triompher_customizer_add_theme_fonts($fonts) {
		$rez = array();	
		foreach ($fonts as $tag => $font) {
			if (substr($font['font-family'], 0, 2) != '{{') {
				$rez[$tag.'_font-family'] 		= !empty($font['font-family']) && !triompher_is_inherit($font['font-family'])
														? 'font-family:' . trim($font['font-family']) . ';' 
														: '';
				$rez[$tag.'_font-size'] 		= !empty($font['font-size']) && !triompher_is_inherit($font['font-size'])
														? 'font-size:' . triompher_prepare_css_value($font['font-size']) . ";"
														: '';
				$rez[$tag.'_line-height'] 		= !empty($font['line-height']) && !triompher_is_inherit($font['line-height'])
														? 'line-height:' . trim($font['line-height']) . ";"
														: '';
				$rez[$tag.'_font-weight'] 		= !empty($font['font-weight']) && !triompher_is_inherit($font['font-weight'])
														? 'font-weight:' . trim($font['font-weight']) . ";"
														: '';
				$rez[$tag.'_font-style'] 		= !empty($font['font-style']) && !triompher_is_inherit($font['font-style'])
														? 'font-style:' . trim($font['font-style']) . ";"
														: '';
				$rez[$tag.'_text-decoration'] 	= !empty($font['text-decoration']) && !triompher_is_inherit($font['text-decoration'])
														? 'text-decoration:' . trim($font['text-decoration']) . ";"
														: '';
				$rez[$tag.'_text-transform'] 	= !empty($font['text-transform']) && !triompher_is_inherit($font['text-transform'])
														? 'text-transform:' . trim($font['text-transform']) . ";"
														: '';
				$rez[$tag.'_letter-spacing'] 	= !empty($font['letter-spacing']) && !triompher_is_inherit($font['letter-spacing'])
														? 'letter-spacing:' . trim($font['letter-spacing']) . ";"
														: '';
				$rez[$tag.'_margin-top'] 		= !empty($font['margin-top']) && !triompher_is_inherit($font['margin-top'])
														? 'margin-top:' . triompher_prepare_css_value($font['margin-top']) . ";"
														: '';
				$rez[$tag.'_margin-bottom'] 	= !empty($font['margin-bottom']) && !triompher_is_inherit($font['margin-bottom'])
														? 'margin-bottom:' . triompher_prepare_css_value($font['margin-bottom']) . ";"
														: '';
			} else {
				$rez[$tag.'_font-family']		= '{{ data["'.$tag.'_font-family"] }}';
				$rez[$tag.'_font-size']			= '{{ data["'.$tag.'_font-size"] }}';
				$rez[$tag.'_line-height']		= '{{ data["'.$tag.'_line-height"] }}';
				$rez[$tag.'_font-weight']		= '{{ data["'.$tag.'_font-weight"] }}';
				$rez[$tag.'_font-style']		= '{{ data["'.$tag.'_font-style"] }}';
				$rez[$tag.'_text-decoration']	= '{{ data["'.$tag.'_text-decoration"] }}';
				$rez[$tag.'_text-transform']	= '{{ data["'.$tag.'_text-transform"] }}';
				$rez[$tag.'_letter-spacing']	= '{{ data["'.$tag.'_letter-spacing"] }}';
				$rez[$tag.'_margin-top']		= '{{ data["'.$tag.'_margin-top"] }}';
				$rez[$tag.'_margin-bottom']		= '{{ data["'.$tag.'_margin-bottom"] }}';
			}
		}
		return $rez;
	}
}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------

if ( !function_exists('triompher_customizer_theme_setup') ) {
	add_action( 'after_setup_theme', 'triompher_customizer_theme_setup' );
	function triompher_customizer_theme_setup() {

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('triompher_filter_add_thumb_sizes', array(
			'triompher-thumb-huge'		=> array(1170, 658, true),
			'triompher-thumb-big' 		=> array( 1520, 820, true),
			'triompher-thumb-med' 		=> array( 740, 450, true),
			'triompher-thumb-tiny' 		=> array(  90,  90, true),
			'triompher-thumb-team' 		=> array(  540,  666, true),
			'triompher-thumb-service' 		=> array(  540,  542, true),
			'triompher-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'triompher-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = triompher_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'triompher_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}

	}
}

if ( !function_exists('triompher_customizer_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'triompher_customizer_image_sizes' );
	function triompher_customizer_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('triompher_filter_add_thumb_sizes', array(
			'triompher-thumb-huge'		=> esc_html__( 'Fullsize image', 'triompher' ),
			'triompher-thumb-big'			=> esc_html__( 'Large image', 'triompher' ),
			'triompher-thumb-med'			=> esc_html__( 'Medium image', 'triompher' ),
			'triompher-thumb-tiny'		=> esc_html__( 'Small square avatar', 'triompher' ),
			'triompher-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'triompher' ),
			'triompher-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'triompher' ),
			)
		);
		$mult = triompher_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'triompher' );
		}
		return $sizes;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( !function_exists( 'triompher_customizer_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'triompher_customizer_trx_addons_add_thumb_sizes');
	function triompher_customizer_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( !function_exists( 'triompher_customizer_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'triompher_customizer_trx_addons_get_thumb_size');
	function triompher_customizer_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-team',
							'trx_addons-thumb-team-@retina',
							'trx_addons-thumb-service',
							'trx_addons-thumb-service-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							),
							array(
							'triompher-thumb-huge',
							'triompher-thumb-huge-@retina',
							'triompher-thumb-big',
							'triompher-thumb-big-@retina',
							'triompher-thumb-med',
							'triompher-thumb-med-@retina',
							'triompher-thumb-tiny',
							'triompher-thumb-tiny-@retina',
							'triompher-thumb-team',
							'triompher-thumb-team-@retina',
							'triompher-thumb-service',
							'triompher-thumb-service-@retina',
							'triompher-thumb-masonry-big',
							'triompher-thumb-masonry-big-@retina',
							'triompher-thumb-masonry',
							'triompher-thumb-masonry-@retina',
							),
							$thumb_size);
	}
}
?>