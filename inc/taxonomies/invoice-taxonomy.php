<?php 

/**
 * invoice Taxonomy
 */
function myplugin_invoice_taxonomy() {
    $labels = array(

        'name'              => _x( 'Categories', 'taxonomy general name', 'invoice' ),

        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'invoice' ),

        'menu_name'         => __( 'Categories', 'invoice' ),

        'search_items'      => __( 'Search Categories', 'invoice' ),

        'all_items'         => __( 'All Categories', 'invoice' ),

        'parent_item'       => __( 'Parent Category', 'invoice' ),

        'parent_item_colon' => __( 'Parent Category:', 'invoice' ),

        'edit_item'         => __( 'Edit Category', 'invoice' ),

        'update_item'       => __( 'Update Category', 'invoice' ),

        'add_new_item'      => __( 'Add New Category', 'invoice' ),

        'new_item_name'     => __( 'New Category Name', 'invoice' ),

    );

    $args = array(

        'hierarchical'      => true,

        'labels'            => $labels,

        'show_ui'           => true,

        'show_admin_column' => true,

        'query_var'         => true,

        'show_in_rest'      => true,

        'rewrite'           => array( 'slug' => 'invoice_cat' ),

    );

    register_taxonomy( 'invoice_cat', array('invoice'), $args );
}
add_action('init', 'myplugin_invoice_taxonomy');