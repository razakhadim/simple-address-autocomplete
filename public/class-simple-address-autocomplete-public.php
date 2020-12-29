<?php

/**
 * @link       https://khadim.nz
 * @since      1.0.0
 *
 * @package    Simple_Address_Autocomplete
 * @subpackage Simple_Address_Autocomplete/public
 */

class Simple_Address_Autocomplete_Public
{

	private $plugin_name;
	private $version;

	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}


	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/simple-address-autocomplete-public.css', array(), $this->version, 'all');
	}

	public function enqueue_scripts()
	{

		//	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-address-autocomplete-public.js', array( 'jquery' ), $this->version, false );

		//enqueue main script and localise get_option
		wp_enqueue_script('saa_js_scripts', plugin_dir_url(__FILE__) . '/js/simple-address-autocomplete-public.js');

		wp_localize_script('saa_js_scripts', 'saa_settings_vars', array(
			'google_maps_api_key' => get_option('google_maps_api_key'),
			'country_selected' => get_option('country', 'option'),
			'enable_geolocation' => get_option('geolocation', 'option'),
			'geo_type' => get_option('geolocation_type', 'option')
		));
	}
}
