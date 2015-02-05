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

	if (is_product_category() || is_product_tag() || is_archive() ) {

	add_action('wp_head','collapser_js');	
	add_action('wp_head', 'register_cat_collapser_script');
}
	
}

?>