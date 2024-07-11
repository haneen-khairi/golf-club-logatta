// Buttons decoration (add 'hover' class)
// Attention! Not use cont.find('selector')! Use jQuery('selector') instead!

jQuery(document).on('action.init_hidden_elements', function(e, cont) {
	"use strict";
	if (TRIOMPHER_STORAGE['button_hover'] && TRIOMPHER_STORAGE['button_hover']!='default') {
		jQuery('button:not(.search_submit):not([class*="sc_button_hover_"]):not([class*="xdsoft_"]),\
				.theme_button:not([class*="sc_button_hover_"]),\
				.sc_button:not([class*="sc_button_simple"]):not([class*="sc_button_hover_"]),\
				.sc_form_field button:not([class*="sc_button_hover_"]),\
				.sc_action_item_link:not(.sc_action_item_link_over):not([class*="sc_button_hover_"]),\
				.trx_addons_hover_content .trx_addons_hover_links a:not([class*="sc_button_hover_"]),\
				.triompher_tabs .triompher_tabs_titles li a:not([class*="sc_button_hover_"]),\
				.hover_shop_buttons .icons a:not([class*="sc_button_hover_style_"]),\
				.woocommerce #respond input#submit:not([class*="sc_button_hover_"]),\
				.woocommerce .button:not([class*="shop_"]):not([class*="sc_button_hover_"]),\
				.woocommerce-page .button:not([class*="shop_"]):not([class*="sc_button_hover_"]),\
				body #btn-pay, body #btn-buy,\
				.wp-block-button:not(.is-style-outline) .wp-block-button__link,\
				#buddypress a.button:not([class*="sc_button_hover_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_'+TRIOMPHER_STORAGE['button_hover']);
		if (TRIOMPHER_STORAGE['button_hover']!='arrow') {
			jQuery('input[type="submit"]:not([class*="sc_button_hover_"]),\
					input[type="button"]:not([class*="sc_button_hover_"]),\
					.tribe-events-button:not([class*="sc_button_hover_"]),\
					#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-bar-mini #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-events-cal-links a:not([class*="sc_button_hover_"]),\
					.tribe-events-sub-nav li a:not([class*="sc_button_hover_"]),\
					.isotope_filters_button:not([class*="sc_button_hover_"]),\
					.trx_addons_scroll_to_top:not([class*="sc_button_hover_"]),\
					.sc_promo_modern .sc_promo_link2:not([class*="sc_button_hover_"]),\
					.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_"]),\
					.tagcloud > a:not([class*="sc_button_hover_"]),\
					.wp-block-tag-cloud a:not([class*="sc_button_hover_style_"])\
					').addClass('sc_button_hover_just_init sc_button_hover_'+TRIOMPHER_STORAGE['button_hover']);
		}
		// Add alter styles of buttons
		jQuery('.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_default');
		jQuery('.trx_addons_hover_content .trx_addons_hover_links a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_inverse');
		jQuery('.woocommerce #respond input#submit.alt:not([class*="sc_button_hover_style_"]),\
				.woocommerce a.button.alt:not([class*="sc_button_hover_style_"]),\
				.woocommerce input.button.alt:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_hover');
		jQuery('.woocommerce .woocommerce-message .button:not([class*="sc_button_hover_style_"]),\
				.woocommerce .woocommerce-info .button:not([class*="sc_button_hover_style_"])\
				.footer_wrap .widget_tag_cloud a:not([class*="sc_button_hover_style_"]),\
				.footer_wrap .wp-block-tag-cloud a:not([class*="sc_button_hover_style_"]),\
				.footer_wrap .widget_product_tag_cloud a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style');
		jQuery('.sidebar .trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.triompher_tabs .triompher_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.sidebar .widget_tag_cloud a:not([class*="sc_button_hover_style_"]),\
				.sidebar .wp-block-tag-cloud a:not([class*="sc_button_hover_style_"]),\
				.sidebar .widget_product_tag_cloud a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_alterbd');
		jQuery('.sc_button.color_style_dark:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"]),\
				.sc_action_item_event .sc_action_item_link:not([class*="sc_button_hover_style_"]),\
				.trx_addons_video_player.with_cover .video_hover:not([class*="sc_button_hover_style_"]),\
				.trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_dark');
		jQuery('.sc_price_link:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_extra');
		jQuery('.sc_button.color_style_link2:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"]),\
		        .sc_team_button a,\
		        .sc_title_button a,\
		        .widget_shopping_cart_content .buttons a,\
		        .woocommerce .widget_price_filter .price_slider_amount .button,\
		        .sc_button_brown\
				').addClass('sc_button_hover_just_init sc_button_hover_style_link2');
		jQuery('.sc_button.color_style_link3:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"]),\
		        .mc4wp-form .mc4wp-form-fields input[type="submit"]\
				').addClass('sc_button_hover_just_init sc_button_hover_style_link3');
		// Remove just init hover class
		setTimeout(function() {
			jQuery('.sc_button_hover_just_init').removeClass('sc_button_hover_just_init');
			}, 500);
		// Remove hover class
		jQuery('.mejs-controls button,\
				.mfp-close,\
				.wp-block-button__link,\
				.sc_button_bg_image,\
				.hover_shop_buttons a,\
				.pswp__button,\
				.sc_layouts_row_type_narrow .sc_button,\
				.sc_services_image_2 .sc_button,\
				.sc_services_item.with_content.with_number.sc_services_item_featured_left .sc_button\
				').removeClass('sc_button_hover_'+TRIOMPHER_STORAGE['button_hover']);

	}
	
});

jQuery(function() {
	"use strict";
	jQuery( "input[type=text].wpcf7-date" ).focus(function() {
		jQuery( this ).blur();
	});
});