<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Simple_Address_Autocomplete
 * @subpackage Simple_Address_Autocomplete/includes
 * @author     Raza Khadim <hi@khadim.nz>
 */
class Simple_Address_Autocomplete_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		exit(wp_redirect( admin_url( 'options-general.php?page=simple_autocomplete' )));

	}

}
