<?php
add_action( 'admin_menu', 'category_collapser_add_admin_menu' );


function category_collapser_add_admin_menu(  ) { 

	add_options_page( 'category-collapser', 'Category Collapser', 'manage_options', 'category-collapser', 'category_collapser_options_page' );

}


function category_collapser_options_page() {
				include_once('settings_page.php');
}



?>