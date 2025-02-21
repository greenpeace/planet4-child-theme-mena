<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

// Use arabic analyzer when needed.
// Ref: https://github.com/10up/ElasticPress/issues/1132
add_filter('ep_analyzer_language', static function (): string {
	return 'arabic';
});
