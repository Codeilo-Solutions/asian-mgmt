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
/**
 * asiamanagement_header_content hook
 *
 * @hooked asiamanagement_output_header_content()
 *
 */
do_action('asiamanagement_header_content');

    // Keep it for plugins.
	wp_head(); ?> 
</head>

<body class="bg-white selection:bg-[#C41E3A] selection:text-white overflow-x-hidden">


