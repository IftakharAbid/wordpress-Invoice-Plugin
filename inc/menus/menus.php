<?php 

/**
 * Custom Admin Menu
 */

define( 'MYPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'MYPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );

function myplugin_custom_admin_menu() {
    add_menu_page(
        __( 'Invoice Generator', 'invoice' ),
        __('Invoice Generator', 'invoice' ),
        'manage_options',
        'custom-menu',
        'myplugin_custom_submenu_template_callback',
        MYPLUGIN_URL . 'admin/img/plugins.png',
        10
    );

    $hook = add_submenu_page(
        'custom-menu',
        __( 'Company Settings', 'invoice' ),
        __( 'Company Settings', 'invoice' ),
        'manage_options',
        'myplugin-settings-page',
        'myplugin_settings_template_callback',
        '',
        null
    );

    add_action( 'admin_head-'.$hook, 'myplugin_image_uplaoder_assets', 10, 1 );

    

    add_submenu_page(
        'admin.php',
        __( 'Custom Link', 'invoice' ),
        __( 'Custom Link', 'invoice' ),
        'manage_options',
        'custom-link',
        'myplugin_custom_link_template_callback'
    );

    add_submenu_page(
        'tools.php',
        __( 'Custom Link', 'invoice' ),
        __( 'Custom Link', 'invoice' ),
        'manage_options',
        'custom-tool-link',
        'myplugin_custom_tool_link_template_callback'
    );

    add_submenu_page(
        'options-general.php',
        __( 'Custom Link', 'invoice' ),
        __( 'Custom Link', 'invoice' ),
        'manage_options',
        'custom-option-link',
        'myplugin_custom_option_link_template_callback'
    );
    
    add_submenu_page(
        'edit.php?post_type=page',
        __( 'Custom Link', 'invoice' ),
        __( 'Custom Link', 'invoice' ),
        'manage_options',
        'custom-theme-link',
        'myplugin_custom_option_link_template_callback'
    );

}
add_action( 'admin_menu', 'myplugin_custom_admin_menu' );

/**
 * Custom Submenu Callback Function
 */
function myplugin_custom_submenu_template_callback() {
    ?>
    <h4>Hi, I am from custom submenu!!!</h4>
    <?php
}

/**
 * Custom Submenu Callback Function 2
 */

/**
 * Custom Link Tempalte Callback Function
 */
function myplugin_custom_link_template_callback() {
    ?>
    <h4>Hello, I am from the custom link template!!!</h4>
    <?php 
}

/**
 * Custom Tool Link Template Callback
 */
function myplugin_custom_tool_link_template_callback() {
    ?>
    <h2>Hey I am form the custom tool link!!</h2>
    <?php 
}


/**
 * Custom Tool Link Template Callback
 */
function myplugin_custom_option_link_template_callback() {
    ?>
    <h2>Hey I am from the custom option link!!</h2>
    <?php 
}


/**
 * Add Custom Menus into Admin Toolbar
 */
function myplugin_custom_admin_toolbar_links($admin_bar) {

    $admin_bar->add_menu(array(
        'id' => 'my-item',
        'title' => 'My Item',
        'href' => '#',
        'meta' => array(
            'title' => 'My Title'
        )
    ));

    $admin_bar->add_menu(array(
        'id' => 'my-first-item',
        'parent' => 'my-item',
        'title' => 'My Submenu Item',
        'href' => '#',
        'meta' => array(
            'title' => 'My Submenu Title',
            'target' => '_blank',
            'class' => 'my_custom_class'
        )
    ));

}
add_action( 'admin_bar_menu', 'myplugin_custom_admin_toolbar_links', 100 );