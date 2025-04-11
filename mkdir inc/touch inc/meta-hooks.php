<?php
/**
 * CMB2: Always save 'include_articles' field as 'no'
 */
add_action( 'cmb2_save_field_include_articles', 'planet4_mena_force_include_articles_to_no', 10, 4 );

function planet4_mena_force_include_articles_to_no( $field_id, $value, $object_id, $field_args ) {
    if ( 'include_articles' === $field_id ) {
        update_post_meta( $object_id, 'include_articles', 'no' );
    }
}
