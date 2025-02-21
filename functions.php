<?php

/**
 * Additional code for the child theme goes in here.
 */
function add_inline_script_for_specific_page() {
    if (is_page('12401') || is_page('12376')) { // Replace 'your-page-slug' with the actual slug or ID
        ?>
        <script>
            <!-- Fundraise Up: the new standard for online giving -->
<script>(function(w,d,s,n,a){if(!w[n]){var l='call,catch,on,once,set,then,track,openCheckout'
.split(','),i,o=function(n){return'function'==typeof n?o.l.push([arguments])&&o
:function(){return o.l.push([n,arguments])&&o}},t=d.getElementsByTagName(s)[0],
j=d.createElement(s);j.async=!0;j.src='https://cdn.fundraiseup.com/widget/'+a+'';
t.parentNode.insertBefore(j,t);o.s=Date.now();o.v=5;o.h=w.location.href;o.l=[];
for(i=0;i<8;i++)o[l[i]]=o(l[i]);w[n]=o}
})(window,document,'script','FundraiseUp','AGKKXWSM');</script>
<!-- End Fundraise Up -->
        </script>
        <?php
    }
}
add_action('wp_footer', 'add_inline_script_for_specific_page');

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
