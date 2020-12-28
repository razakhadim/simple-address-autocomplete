<?php

/**

 * @wordpress-plugin
 * Plugin Name:       Simple Address Autocomplete
 * Plugin URI:        https://saa.khadim.nz
 * Description:       A simple way to add Google address autocomplete functionality to any form field.
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
 * Current plugin version.
 */
define( 'SIMPLE_ADDRESS_AUTOCOMPLETE_VERSION', '1.0.0' );


$googleAPIKey = get_option( 'google_maps_api_key');
$countrySelected = get_option( 'country', 'option' );
$enableGeo = get_option( 'geolocation', 'option' );
$geoType = get_option( 'geolocation_type', 'option' );

// enqueue google maps api key
add_action( 'wp_head', 'saa_google_maps_api_key');
function saa_google_maps_api_key(){
	wp_enqueue_script( 'google_maps_api', 'https://maps.googleapis.com/maps/api/js?key='. get_option( 'google_maps_api_key') . '&callback=initAutocomplete&libraries=places' );
}

// enqueue main js file
wp_enqueue_script( 'saa_js_scripts', plugin_dir_url( __FILE__ ).'/public/js/simple-address-autocomplete-public.js');


//localising PHP get_options to use in JS

wp_localize_script( 'saa_js_scripts', 'saa_settings_vars', array(
	'google_maps_api_key' => $googleAPIKey,
	'country_selected' => $countrySelected,
	'enable_geolocation' => $enableGeo,
	'geo_type' => $geoType
) 
);


function activate_simple_address_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-address-autocomplete-activator.php';
	Simple_Address_Autocomplete_Activator::activate();
}


function deactivate_simple_address_autocomplete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-address-autocomplete-deactivator.php';
	Simple_Address_Autocomplete_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_address_autocomplete' );
register_deactivation_hook( __FILE__, 'deactivate_simple_address_autocomplete' );


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

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'docs_link' );

function docs_link ($url){
	$url[] = '<a href="https://saa.khadim.nz/"> Support </a>';
	$url[] = '<a href="https://khadim.nz/kb/simple-address-autocomplete"> Settings </a>';

	return $url;
}

run_simple_address_autocomplete();
