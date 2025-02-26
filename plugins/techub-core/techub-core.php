<?php

/**
 * Plugin Name: Techub Core
 * Description: Techub theme's Elementor widget plugin.
 * Plugin URI:  https://sahabuddin.me/
 * Version:     1.0.0
 * Author:      Sahab Uddin
 * Author URI:  https://sahabuddin.me/
 * Text Domain: techub-core
 * 
 * Requires Plugins: elementor
 * Elementor tested up to: 3.26.5
 * Elementor Pro tested up to: 3.5.0
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Main Elementor Hello World Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.2.0
 */
final class Techub_Core
{

	/**
	 * Plugin Version
	 *
	 * @since 1.2.1
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct()
	{

		// Init Plugin
		add_action('plugins_loaded', array($this, 'init'));
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function init()
	{

		// Check if Elementor installed and activated
		if (! did_action('elementor/loaded')) {
			add_action('admin_notices', array($this, 'admin_notice_missing_main_plugin'));
			return;
		}

		// Check for required Elementor version
		if (! version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
			return;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once('plugin.php');
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'techub-core'),
			'<strong>' . esc_html__('Elementor Hello World', 'techub-core') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'techub-core') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'techub-core'),
			'<strong>' . esc_html__('Elementor Hello World', 'techub-core') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'techub-core') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'techub-core'),
			'<strong>' . esc_html__('Elementor Hello World', 'techub-core') . '</strong>',
			'<strong>' . esc_html__('PHP', 'techub-core') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}
}

// create Elementor widget Category
function add_techub_widget_categories($elements_manager)
{
	$elements_manager->add_category(
		'techub_widget_cat',
		[
			'title' => esc_html__('Techub Core', 'textdomain'),
			'icon' => 'eicon-justify-start-v',
		]
	);
}
add_action('elementor/elements/categories_registered', 'add_techub_widget_categories');

// call the custom core-functions 
include_once('include/core-functions.php');
include_once('include/class-ocdi-importer.php');
include_once('include/portfolio-post.php');
include_once('libs/icons/icon-packs.php');

// Instantiate Techub_Core.
new Techub_Core();
