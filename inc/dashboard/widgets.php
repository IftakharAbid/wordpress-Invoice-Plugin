<?php

/**
 * invoice Dashboard Widget
 */
function myplugin_invoice_dashboard_widget() {
    wp_add_dashboard_widget(
        'myplugin_invoice_dash_widget',
        'invoice At a Glance',
        'myplugin_miovie_glance_callback'
    );
}
add_action( 'wp_dashboard_setup', 'myplugin_invoice_dashboard_widget' );

/**
 * invoice Dashboard Widget Callback
 */
function myplugin_miovie_glance_callback() {
    $query = new WP_Query([ 'post_type' => 'invoice' ]);
    $count = wp_count_posts( 'invoice' );
    ?>
    <div class="main">
        <ul>
            <li class="post-count">
                Total: <a href="<?php echo admin_url( '/edit.php?post_type=invoice' ) ?>"><?php echo $query->post_count; ?> invoices</a>
            </li>
            <li class="post-publish">
                Publish: <a href="<?php echo admin_url( '/edit.php?post_status=publish&post_type=invoice' ) ?>"><?php echo $count->publish; ?> invoices</a>
            </li>
            <li class="post-draft">
                Draft: <a href="<?php echo admin_url( '/edit.php?post_status=draft&post_type=invoice' ) ?>"><?php echo $count->draft; ?> invoice</a>
            </li>
        </ul>
    </div>
    <?php
}