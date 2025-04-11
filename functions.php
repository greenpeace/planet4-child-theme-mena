<?php

/**
 * Additional code for the child theme goes in here.
 */

// Enqueue child theme styles
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99 );

function enqueue_child_styles() {
	$css_creation = filectime( get_stylesheet_directory() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

// Use Arabic analyzer when needed.
// Ref: https://github.com/10up/ElasticPress/issues/1132
add_filter( 'ep_analyzer_language', static function (): string {
	return 'arabic';
	require_once get_stylesheet_directory() . '/inc/hooks/meta-hooks.php';
	<?php
// File: inc/hooks/meta-hooks.php

/**
 * Force the 'include_articles' field to always be saved as 'no'
 * regardless of the user's input in the backend.
 */
add_action( 'cmb2_save_field_include_articles', 'planet4_mena_force_include_articles_to_no', 10, 4 );

function planet4_mena_force_include_articles_to_no( $field_id, $value, $object_id, $field_args ) {
	if ( 'include_articles' === $field_id ) {
		update_post_meta( $object_id, 'include_articles', 'no' );
	}
}

} );
