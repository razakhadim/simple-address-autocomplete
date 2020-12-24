<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://khadim.nz
 * @since      1.0.0
 *
 * @package    Simple_Address_Autocomplete
 * @subpackage Simple_Address_Autocomplete/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Simple_Address_Autocomplete
 * @subpackage Simple_Address_Autocomplete/includes
 * @author     Raza Khadim <hi@khadim.nz>
 */
class Simple_Address_Autocomplete_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'simple-address-autocomplete',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
