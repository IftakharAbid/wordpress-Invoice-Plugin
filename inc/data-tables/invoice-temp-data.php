<?php 

/**
 * Add columns to data table
 */
function myplugin_invoice_temp_add_columns( $columns ) {

    unset($columns['date']);
    unset($columns['author']);
    unset($columns['taxonomy-invoice_temp_cat']);

   
    $columns['invoice']            = __('Adress', 'invoice');
 
    $columns['author']                  = __('Author', 'invoice');
    $columns['taxonomy-invoice_temp_cat']      = __('Categories', 'invoice');
    $columns['date']                    = __('Published On', 'invoice');

    return $columns;
}
add_action( 'manage_invoice_temp_posts_columns', 'myplugin_invoice_temp_add_columns' );

/**
 * Output Table Column Values
 */
function output_temp_column_content( $column, $post_id ) {

    switch( $column ) {
        case 'image' :
            echo get_the_post_thumbnail($post_id, 'poster-thumbnail');
            break;
        case 'invoice' :
            echo get_post_meta( $post_id, '_myplugin_invoice_temp_invoice', true );
            break;
        case 'video_type' :
            echo get_post_meta( $post_id, '_myplugin_invoice_temp_video_type', true );
            break;

        default: 
            break;
    }

}
add_filter('manage_invoice_temp_posts_custom_column', 'output_temp_column_content', 10, 2);
add_image_size('poster-thumbnail', 50);

/**
 * Making Columns Sortable
 */
function myplugin_make_invoice_temp_columns_sortable( $columns ) {
    $columns['invoice']    = 'invoice';
    $columns['video_type']      = 'video_type';

    return $columns;
}
add_filter('manage_edit-invoice_temp_sortable_columns', 'myplugin_make_invoice_temp_columns_sortable');

/**
 * Columns sorting logic
 */
function myplugin_invoice_temp_columns_sorting_logic( $query ) {

    if( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if( 'invoice' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_myplugin_invoice_temp_invoice');
    }

    if( 'video_type' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_myplugin_invoice_temp_video_type');
    }

}
add_action( 'pre_get_posts', 'myplugin_invoice_temp_columns_sorting_logic' );