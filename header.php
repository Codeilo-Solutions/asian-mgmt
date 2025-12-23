<?php
/**
 * Header Template
 * 
 * @package ASIAMANAGEMENT
 */
?>
<!doctype html>
<html lang="en">
<head>
	<?php 
	/**
	 * asiamanagement_meta hook
	 *
	 * @hooked asiamanagement_add_meta
	 */
	do_action('asiamanagement_meta');

	/**
	 * asiamanagement_links hook
	 *
	 * @hooked asiamanagement_add_links
	 */
	do_action('asiamanagement_links');

    // Keep it for plugins.
	wp_head(); ?> 
</head>

<body <?php echo body_class(); ?>>


