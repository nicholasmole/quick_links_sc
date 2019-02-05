<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nickmole.com
 * @since             1.0.0
 * @package           Quick_links
 *
 * @wordpress-plugin
 * Plugin Name:       Quick_Links
 * Plugin URI:        quick_links
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nicholas Mole
 * Author URI:        https://nickmole.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quick_links
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-quick_links-activator.php
 */
function activate_quick_links() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick_links-activator.php';
	Quick_links_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-quick_links-deactivator.php
 */
function deactivate_quick_links() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick_links-deactivator.php';
	Quick_links_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_quick_links' );
register_deactivation_hook( __FILE__, 'deactivate_quick_links' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-quick_links.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_quick_links() {

	$plugin = new Quick_links();
	$plugin->run();

}
run_quick_links();
