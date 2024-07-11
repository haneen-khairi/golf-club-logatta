<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('triompher_mailchimp_get_css')) {
	add_filter('triompher_filter_get_css', 'triompher_mailchimp_get_css', 10, 4);
	function triompher_mailchimp_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		
			
			$rad = triompher_get_border_radius();
			$css['fonts'] .= <<<CSS

.mc4wp-form .mc4wp-form-fields input[type="email"],
.mc4wp-form .mc4wp-form-fields input[type="submit"] {
	-webkit-border-radius: {$rad};
	    -ms-border-radius: {$rad};
			border-radius: {$rad};
}

CSS;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

.mc4wp-form input[type="email"] {
	background-color: {$colors['input_bg_color']};
	border-color: {$colors['input_bg_color']};
	color: {$colors['input_text']};
}
.mc4wp-form .mc4wp-alert {
	background-color: {$colors['text_link']};
	border-color: {$colors['text_hover']};
	color: {$colors['inverse_link']};
}

.mc4wp-form input[type="submit"][disabled] {
	background-color: {$colors['text_light']} !important;
    color: {$colors['alter_text']} !important;
}

CSS;
		}

		return $css;
	}
}
?>