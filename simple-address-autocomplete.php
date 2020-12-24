<?php

/**

 * @wordpress-plugin
 * Plugin Name:       Simple Address Autocomplete
 * Plugin URI:        https://khadim.nz/wp/saa
 * Description:       A simple way to add Google address autocomplete to any form field.
 * Version:           1.0.0
 * Author:            Raza Khadim
 * Author URI:        https://khadim.nz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-address-autocomplete
 * Domain Path:       /languages
 * 
 * 
 * @link              https://khadim.nz
 * @since             1.0.0
 * @package           Simple_Address_Autocomplete
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'SIMPLE_ADDRESS_AUTOCOMPLETE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-address-autocomplete-activator.php
 */
function activate_simple_address_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-address-autocomplete-activator.php';
	Simple_Address_Autocomplete_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-address-autocomplete-deactivator.php
 */
function deactivate_simple_address_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-address-autocomplete-deactivator.php';
	Simple_Address_Autocomplete_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_address_autocomplete' );
register_deactivation_hook( __FILE__, 'deactivate_simple_address_autocomplete' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-address-autocomplete.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_address_autocomplete() {

	$plugin = new Simple_Address_Autocomplete();
	$plugin->run();

}
run_simple_address_autocomplete();
