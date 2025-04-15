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
});

/**
 * Force the 'include_articles' field saved as 'no'
 * when a new post is created.
 */
add_action( 'wp_insert_post', 'force_include_articles_to_no', 10, 3 );

function force_include_articles_to_no( $post_id, $post, $update ) {
	if ( 'post' !== $post->post_type || $update ) {
		return;
	}

	update_post_meta( $post_id, 'include_articles', 'no' );
}

/**
 * Update all posts to set include_articles to 'no'
 */
function update_all_posts_include_articles_to_no() {
    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'published',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            update_post_meta(get_the_ID(), 'include_articles', 'no');
        }
    }

    wp_reset_postdata();

    return $query->found_posts;
}

// This function should be run only once
update_all_posts_include_articles_to_no();
