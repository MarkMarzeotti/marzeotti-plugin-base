<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://markmarzeotti.com
 * @since      1.0.0
 *
 * @package    MPB_Marzeotti_Plugin_Base
 * @subpackage MPB_Marzeotti_Plugin_Base/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MPB_Marzeotti_Plugin_Base
 * @subpackage MPB_Marzeotti_Plugin_Base/includes
 * @author     Mark Marzeotti <mark@markmarzeotti.com>
 */
class MPB_Marzeotti_Plugin_Base_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'marzeotti-plugin-base',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
