<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage TRIOMPHER
 * @since TRIOMPHER 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('triompher_storage_get')) {
	function triompher_storage_get($var_name, $default='') {
		global $TRIOMPHER_STORAGE;
		return isset($TRIOMPHER_STORAGE[$var_name]) ? $TRIOMPHER_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('triompher_storage_set')) {
	function triompher_storage_set($var_name, $value) {
		global $TRIOMPHER_STORAGE;
		$TRIOMPHER_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('triompher_storage_empty')) {
	function triompher_storage_empty($var_name, $key='', $key2='') {
		global $TRIOMPHER_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($TRIOMPHER_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($TRIOMPHER_STORAGE[$var_name][$key]);
		else
			return empty($TRIOMPHER_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('triompher_storage_isset')) {
	function triompher_storage_isset($var_name, $key='', $key2='') {
		global $TRIOMPHER_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($TRIOMPHER_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($TRIOMPHER_STORAGE[$var_name][$key]);
		else
			return isset($TRIOMPHER_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('triompher_storage_inc')) {
	function triompher_storage_inc($var_name, $value=1) {
		global $TRIOMPHER_STORAGE;
		if (empty($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = 0;
		$TRIOMPHER_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('triompher_storage_concat')) {
	function triompher_storage_concat($var_name, $value) {
		global $TRIOMPHER_STORAGE;
		if (empty($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = '';
		$TRIOMPHER_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('triompher_storage_get_array')) {
	function triompher_storage_get_array($var_name, $key, $key2='', $default='') {
		global $TRIOMPHER_STORAGE;
		if ( '' === $key2 ) {
			return ! empty( $var_name ) && '' !== $key && isset( $TRIOMPHER_STORAGE[ $var_name ][ $key ] ) ? $TRIOMPHER_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && '' !== $key && isset( $TRIOMPHER_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $TRIOMPHER_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if (!function_exists('triompher_storage_set_array')) {
	function triompher_storage_set_array($var_name, $key, $value) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if ($key==='')
			$TRIOMPHER_STORAGE[$var_name][] = $value;
		else
			$TRIOMPHER_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('triompher_storage_set_array2')) {
	function triompher_storage_set_array2($var_name, $key, $key2, $value) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if (!isset($TRIOMPHER_STORAGE[$var_name][$key])) $TRIOMPHER_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$TRIOMPHER_STORAGE[$var_name][$key][] = $value;
		else
			$TRIOMPHER_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('triompher_storage_merge_array')) {
	function triompher_storage_merge_array($var_name, $key, $value) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if ($key==='')
			$TRIOMPHER_STORAGE[$var_name] = array_merge($TRIOMPHER_STORAGE[$var_name], $value);
		else
			$TRIOMPHER_STORAGE[$var_name][$key] = array_merge($TRIOMPHER_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('triompher_storage_set_array_after')) {
	function triompher_storage_set_array_after($var_name, $after, $key, $value='') {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if (is_array($key))
			triompher_array_insert_after($TRIOMPHER_STORAGE[$var_name], $after, $key);
		else
			triompher_array_insert_after($TRIOMPHER_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('triompher_storage_set_array_before')) {
	function triompher_storage_set_array_before($var_name, $before, $key, $value='') {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if (is_array($key))
			triompher_array_insert_before($TRIOMPHER_STORAGE[$var_name], $before, $key);
		else
			triompher_array_insert_before($TRIOMPHER_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('triompher_storage_push_array')) {
	function triompher_storage_push_array($var_name, $key, $value) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($TRIOMPHER_STORAGE[$var_name], $value);
		else {
			if (!isset($TRIOMPHER_STORAGE[$var_name][$key])) $TRIOMPHER_STORAGE[$var_name][$key] = array();
			array_push($TRIOMPHER_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('triompher_storage_pop_array')) {
	function triompher_storage_pop_array($var_name, $key='', $defa='') {
		global $TRIOMPHER_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($TRIOMPHER_STORAGE[$var_name]) && is_array($TRIOMPHER_STORAGE[$var_name]) && count($TRIOMPHER_STORAGE[$var_name]) > 0) 
				$rez = array_pop($TRIOMPHER_STORAGE[$var_name]);
		} else {
			if (isset($TRIOMPHER_STORAGE[$var_name][$key]) && is_array($TRIOMPHER_STORAGE[$var_name][$key]) && count($TRIOMPHER_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($TRIOMPHER_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('triompher_storage_inc_array')) {
	function triompher_storage_inc_array($var_name, $key, $value=1) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if (empty($TRIOMPHER_STORAGE[$var_name][$key])) $TRIOMPHER_STORAGE[$var_name][$key] = 0;
		$TRIOMPHER_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('triompher_storage_concat_array')) {
	function triompher_storage_concat_array($var_name, $key, $value) {
		global $TRIOMPHER_STORAGE;
		if (!isset($TRIOMPHER_STORAGE[$var_name])) $TRIOMPHER_STORAGE[$var_name] = array();
		if (empty($TRIOMPHER_STORAGE[$var_name][$key])) $TRIOMPHER_STORAGE[$var_name][$key] = '';
		$TRIOMPHER_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('triompher_storage_call_obj_method')) {
	function triompher_storage_call_obj_method($var_name, $method, $param=null) {
		global $TRIOMPHER_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($TRIOMPHER_STORAGE[$var_name]) ? $TRIOMPHER_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($TRIOMPHER_STORAGE[$var_name]) ? $TRIOMPHER_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('triompher_storage_get_obj_property')) {
	function triompher_storage_get_obj_property($var_name, $prop, $default='') {
		global $TRIOMPHER_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($TRIOMPHER_STORAGE[$var_name]->$prop) ? $TRIOMPHER_STORAGE[$var_name]->$prop : $default;
	}
}
?>