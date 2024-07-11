/* global jQuery:false */
/* global TRIOMPHER_STORAGE:false */
/* global TRX_ADDONS_STORAGE:false */

(function() {
	"use strict";
	
	jQuery(document).on('action.add_googlemap_styles', triompher_trx_addons_add_googlemap_styles);
	jQuery(document).on('action.init_shortcodes', triompher_trx_addons_init);
	jQuery(document).on('action.init_hidden_elements', triompher_trx_addons_init);
	
	// Add theme specific styles to the Google map
	function triompher_trx_addons_add_googlemap_styles(e) {
		if (typeof TRX_ADDONS_STORAGE == 'undefined') return;
		TRX_ADDONS_STORAGE['googlemap_styles']['dark'] = [
			{
				"featureType": "administrative",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#0096aa"
					},
					{
						"weight": "0.30"
					},
					{
						"saturation": "-75"
					},
					{
						"lightness": "5"
					},
					{
						"gamma": "1"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#0096aa"
					},
					{
						"saturation": "-75"
					},
					{
						"lightness": "5"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.text.stroke",
				"stylers": [
					{
						"color": "#ffe146"
					},
					{
						"visibility": "on"
					},
					{
						"weight": "6"
					},
					{
						"saturation": "-28"
					},
					{
						"lightness": "0"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#e6007e"
					},
					{
						"weight": "1"
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
					{
						"color": "#ffe146"
					},
					{
						"saturation": "-28"
					},
					{
						"lightness": "0"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
					{
						"color": "#0096aa"
					},
					{
						"visibility": "simplified"
					},
					{
						"saturation": "-75"
					},
					{
						"lightness": "5"
					},
					{
						"gamma": "1"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#ffe146"
					},
					{
						"weight": 8
					},
					{
						"saturation": "-28"
					},
					{
						"lightness": "0"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#0096aa"
					},
					{
						"weight": 8
					},
					{
						"lightness": "5"
					},
					{
						"gamma": "1"
					},
					{
						"saturation": "-75"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					},
					{
						"color": "#0096aa"
					},
					{
						"saturation": "-75"
					},
					{
						"lightness": "5"
					},
					{
						"gamma": "1"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#5e5c5c"
					},
					{
						"saturation": "-75"
					},
					{
						"lightness": "5"
					},
					{
						"gamma": "1"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text",
				"stylers": [
					{
						"visibility": "simplified"
					},
					{
						"color": "#ffe146"
					},
					{
						"saturation": "-28"
					},
					{
						"lightness": "0"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			}
		];
	}
	
	
	function triompher_trx_addons_init(e, container) {
		if (arguments.length < 2) var container = jQuery('body');
		if (container===undefined || container.length === undefined || container.length == 0) return;
		container.find('.sc_countdown_item canvas:not(.inited)').addClass('inited').attr('data-color', TRIOMPHER_STORAGE['alter_link_color']);
	}

})();