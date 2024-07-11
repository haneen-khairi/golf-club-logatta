<?php
/**
 * Child-Theme functions and definitions
 */

 function triompher_child_scripts() {
    wp_enqueue_style( 'triompher-parent-style', get_template_directory_uri(). '/style.css' );
	if ( is_rtl() ) {
		wp_enqueue_style( 'triompher-parent-style', get_template_directory_uri() . '/rtl.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'triompher_child_scripts' );
 
?>