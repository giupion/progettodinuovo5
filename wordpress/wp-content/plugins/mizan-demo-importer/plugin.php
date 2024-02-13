<?php
/*
  Plugin Name:       Mizan Demo Importer
  Plugin URI:        
  Description:       This plugin helps to import demo content using elementor.
  Version:           0.0.2
  Requires at least: 5.2
  Requires PHP:      7.2
  Author:            mizanthemes
  Author URI:        https://www.mizanthemes.com/
  License:           GPL v2 or later
  License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain:       mizan-demo-importer
*/

register_activation_hook(__FILE__, 'mizan_importer_activate');
add_action('admin_init', 'mizan_importer_redirect');

function mizan_importer_activate() {
  add_option('mizan_importer_do_activation_redirect', true);
}
function mizan_importer_redirect() {
  if (get_option('mizan_importer_do_activation_redirect', false)) {
    delete_option('mizan_importer_do_activation_redirect');
    wp_redirect("admin.php?page=mizandemoimporter-wizard");
    exit;
  }
}

define( 'MDI_FILE', __FILE__ );
define( 'MDI_BASE', plugin_basename( MDI_FILE ) );
define( 'MDI_DIR', plugin_dir_path( MDI_FILE ) );
define( 'MDI_URL', plugins_url( '/', MDI_FILE ) );
define( 'MDI_THEME_LICENCE_ENDPOINT', 'https://www.mizanthemes.com/wp-json/unique-licence/v2/' );
define( 'MIZAN_IMPORTER_TEXT_DOMAIN', "mizan-demo-importer" );
define( 'MIZAN_MAIN_URL', "https://www.mizanthemes.com/" );

if( ! function_exists('get_plugin_data') ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
require MDI_DIR .'theme-wizard/config.php';
