<?php 

/**
 * Create invoice Post Type
 */
function myplugin_invoice_temp_post_type() {
    $labels = array(

        'name'                  => _x( 'Invoices', 'Post type general name', 'invoice' ),

        'singular_name'         => _x( 'Invoice', 'Post type singular name', 'invoice' ),

        'menu_name'             => _x( 'Invoices', 'Admin Menu text', 'invoice' ),

        'name_admin_bar'        => _x( 'Invoice', 'Add New on Toolbar', 'invoice' ),

        'add_new'               => __( 'Add New invoice', 'invoice' ),

        'add_new_item'          => __( 'Add New invoice', 'invoice' ),

        'new_item'              => __( 'New invoice', 'invoice' ),

        'edit_item'             => __( 'Edit invoice', 'invoice' ),

        'view_item'             => __( 'View invoice', 'invoice' ),

        'all_items'             => __( 'All invoices', 'invoice' ),

        'search_items'          => __( 'Search invoices', 'invoice' ),

        'parent_item_colon'     => __( 'Parent invoices:', 'invoice' ),

        'not_found'             => __( 'No invoice found.', 'invoice' ),

        'not_found_in_trash'    => __( 'No invoice found in Trash.', 'invoice' ),

        'featured_image'        => _x( 'invoice Cover Image', '', 'invoice' ),

        'set_featured_image'    => _x( 'Set cover image', '', 'invoice' ),

        'remove_featured_image' => _x( 'Remove cover image', '', 'invoice' ),

        'use_featured_image'    => _x( 'Use as cover image', '', 'invoice' ),

        'archives'              => _x( 'invoice archives', '', 'invoice' ),

        'insert_into_item'      => _x( 'Insert into invoice', '', 'invoice' ),

        'uploaded_to_this_item' => _x( 'Uploaded to this invoice', '', 'invoice' ),

        'filter_items_list'     => _x( 'Filter invoices list', '', 'invoice' ),

        'items_list_navigation' => _x( 'invoices list navigation', '', 'invoice' ),

        'items_list'            => _x( 'invoices list', '', 'invoice' ),

    );

    $args = array(

        'labels'             => $labels,

        'public'             => true,

        'publicly_queryable' => true,

        'show_ui'            => true,

        'show_in_menu'       => 'custom-menu',
        'show_in_rest'       => true,

        'query_var'          => true,

        'rewrite'            => array( 'slug' => 'invoice' ),

        'capability_type'    => 'post',

        'has_archive'        => true,

        'hierarchical'       => false,

        'menu_position'      => null,

        'show_in_rest'       => true,
        'rest_controller_class' => 'WP_REST_Posts_Controller',

        'supports'           => array( 'title' ),

    );

    register_post_type( 'invoicetemp', $args );
}

add_action( 'init', 'myplugin_invoice_temp_post_type' );

/**
 * Update title placeholder
 */
function myplugin_update_invoice_temp_title_placeholder($title) {
    $screen = get_current_screen();
    if( 'invoice' === $screen->post_type ) {
        $title = 'Add invoice name';
    }

    return $title;
}
add_filter('enter_title_here', 'myplugin_update_invoice_temp_title_placeholder');