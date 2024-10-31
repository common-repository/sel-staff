<?php

/**
 * Plugin Name:       Sel Staff
 * Plugin URI:        https://selthemes.com/plugins/sel-staff
 * Description:		    Display Team Members in WordPress Themes;
 * Version:           1.0.2
 * Author:            Selthemes
 * Author URI:        https://selthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       selthemes
 * Domain Path:       /languages
 */

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}


/**
 * Include Post Type
 *
 * @since 1.0.0
 */
require_once ( plugin_dir_path(__FILE__) . '/inc/tgmpa/required-plugin.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/staff-post-type.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/staff-meta.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/staff-columns.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/staff-functions.php');


/**
 * Flush the permalinks
 * Load CPTs and Taxonomies
 *
 * @since 1.0.0
 */
function selt_staff_activate() {
	selt_staff_post_type();
  selt_staff_group_taxonomy();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'selt_staff_activate' );
