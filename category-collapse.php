<?php
/**
 * Plugin Name: Category Collapser
 * Plugin URI: http://raison.co/category-collapse/
 * Description: I collapse category descriptions
 * Version: 1.0.0
 * Author: Raison
 * Author URI: http://raison.co
 * Requires at least: 4.0.0
 * Tested up to: 4.0.0
 *
 * Text Domain: category-collapse
 * Domain Path: /languages/
 *
 * @package Category_Collapse
 * @category Core
 * @author Raison
   @GitHub Plugin URI: https://github.com/raisonon/category-collapser
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly





// load collapser JS

function register_cat_collapser_script() {
	wp_register_script('cat-collapser', plugins_url( 'assets/js/jquery.collapser.min.js' , __FILE__ ), array('jquery'), true);
	wp_print_scripts('cat-collapser');

}



// custom css 

function category_collapser_css() {

	    wp_register_style('googleFonts', plugins_url( 'assets/css/category_collapser.css' , __FILE__ ));
		wp_enqueue_style( 'googleFonts');
}

add_action( 'wp_enqueue_scripts', 'category_collapser_css', 30 );




// simple settings





/*
  * Simple Settings
  * https://github.com/clifgriffin/wordpress-simple-settings/
*/




// Include the framework only if another plugin has not already done so
if ( ! class_exists('WordPress_SimpleSettings') )
	require('classes/wordpress-simple-settings.php'); 

class ccollapsePlugin extends WordPress_SimpleSettings {
	var $prefix = 'ccollapse'; // this is super recommended

	function __construct() {
		parent::__construct(); // this is required


		register_activation_hook(__FILE__, array($this, 'activate') );
	}

	function activate() {
		$this->add_setting('ccollapse_truncate_mode', 'lines');
		$this->add_setting('ccollapse_truncate_amount', '2');
		$this->add_setting('ccollapse_truncate_speed', 'medium');
		
	}
}

$ccollapsePlugin = new ccollapsePlugin();




// Includes



include_once('includes/settings.php');
include_once('includes/main.php');


?>