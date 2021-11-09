<?php
/**
 * Plugin Name: INVOICE
 * Plugin URI: devsnet.com
 * Author: Devsnet
 * Author URI: devsnet.com
 * Version: 1.0.0
 * Text Domain: invoice
 * Description:
 */
if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'MYPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'MYPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );

/**
 * Include admin.php
 */
if( is_admin() ) {
    require_once MYPLUGIN_PATH . '/admin/admin.php';
}

/**
 * Include public.php 
 */
if( !is_admin() ) {
    require_once MYPLUGIN_PATH . '/public/public.php';
}

/**
 * Include Post Types
 */
require_once MYPLUGIN_PATH . '/inc/post-types/invoice.php';
/**
 * Include Post Types
 */
require_once MYPLUGIN_PATH . '/inc/post-types/invoice-temp.php';


/**
 * Inclide Taxonomies
 */
require_once MYPLUGIN_PATH . '/inc/taxonomies/invoice-taxonomy.php';

/**
 * Include Metaboxes
 */
require_once MYPLUGIN_PATH . '/inc/metaboxes/invoice-metaboxes.php';

/**
 * Inlcudes Data Tables
 */
require_once MYPLUGIN_PATH . '/inc/data-tables/invoice-data-table.php';




/**
 * Include Metaboxes
 */
require_once MYPLUGIN_PATH . '/inc/metaboxes/invoice-temp-metabox.php';

/**
 * Inlcudes Data Tables
 */
require_once MYPLUGIN_PATH . '/inc/data-tables/invoice-temp-data.php';



/**
 * Include Admin Menus
 */
require_once MYPLUGIN_PATH . '/inc/menus/menus.php';

/**
 * Include Settings Page
 */
require_once MYPLUGIN_PATH . '/inc/settings/settings.php';

/**
 * Include Shortcodes
 */
require_once MYPLUGIN_PATH . '/inc/shortcodes/shortcodes.php';

/**
 * Include Custom Dashboard Widgets
 */
require_once MYPLUGIN_PATH . '/inc/dashboard/widgets.php';

/**
 * Include WordPress Custom WIdgets
 */
require_once MYPLUGIN_PATH . '/inc/widgets/invoice-widget.php';

