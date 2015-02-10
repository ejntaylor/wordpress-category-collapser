<?php
	
	


// Add Collapser Params

function collapser_js() {
global $ccollapsePlugin;

?>

<script>
	jQuery(function ($) {

		 $('.term-description, .archive-description').collapser({
			mode: '<?php echo $ccollapsePlugin->get_setting('ccollapse_truncate_mode'); ?>',
			truncate: <?php echo $ccollapsePlugin->get_setting('ccollapse_truncate_amount'); ?>,
			speed: '<?php echo $ccollapsePlugin->get_setting('ccollapse_truncate_speed'); ?>',

		});
		
		
	}); // jQuery(funtion...	
	
</script>

<?php	
}

// conditional

add_action('template_redirect','conditional_functions');

function conditional_functions() {

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if (is_product_category() || is_product_tag() ) {
			$cat_display = true;
		}
	
	}
	
elseif ( is_archive() ) {
			$cat_display = true;	
	}
	
else {
			$cat_display = false;		
}
	

if ($cat_display == true) {	

	add_action('wp_head','collapser_js');	
	add_action('wp_head', 'register_cat_collapser_script');
}
	
}

?>