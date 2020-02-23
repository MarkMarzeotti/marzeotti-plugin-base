<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           MPB_Marzeotti_Plugin_Base
 *
 * @wordpress-plugin
 * Plugin Name:       Marzeotti Plugin Base
 * Plugin URI:        https://markmarzeotti.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mark Marzeotti
 * Author URI:        https://markmarzeotti.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       marzeotti-plugin-base
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MPB_MARZEOTTI_PLUGIN_BASE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mpb-marzeotti-plugin-base-activator.php
 */
function mpb_activate_marzeotti_plugin_base() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mpb-marzeotti-plugin-base-activator.php';
	MPB_Marzeotti_Plugin_Base_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mpb-marzeotti-plugin-base-deactivator.php
 */
function mpb_deactivate_marzeotti_plugin_base() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mpb-marzeotti-plugin-base-deactivator.php';
	MPB_Marzeotti_Plugin_Base_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'mpb_activate_marzeotti_plugin_base' );
register_deactivation_hook( __FILE__, 'mpb_deactivate_marzeotti_plugin_base' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mpb-marzeotti-plugin-base.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function mpb_run_marzeotti_plugin_base() {

	$plugin = new MPB_Marzeotti_Plugin_Base();
	$plugin->run();

}
mpb_run_marzeotti_plugin_base();
