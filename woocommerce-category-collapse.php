<?php
/**
 * Plugin Name: WooCommerce Category Collapser
 * Plugin URI: http://raison.co/woocommerce-category-collapse/
 * Description: I collapse WooCommerce category descriptions
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
   @GitHub Plugin URI: https://github.com/raisonon/woocommerce-category-collapser
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




// Add Collapser Params

function collapser_js() {

?>

<script>
	jQuery(function ($) {

		 $('.term-description').collapser({
			mode: 'lines',
			truncate: 2,
		});
	}); // jQuery(funtion...	
	
</script>

<?php	
}

// conditional

add_action('template_redirect','conditional_functions');

function conditional_functions() {

	if (is_product_category()) {
		
	add_action('wp_head','collapser_js');	
	add_action('wp_head', 'register_cat_collapser_script');
}
	
}

	
	

?>
