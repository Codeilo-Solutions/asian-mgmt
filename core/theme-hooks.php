<?php
/**
 * asiamanagement Template Hooks
 *
 * Action/filter hooks used for asiamanagement functions/templates
 *
 * @package 	asiamanagement
 *
 * @since     	asiamanagement 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*==================================================================================================
  Functions
  ==================================================================================================*/

if (!function_exists('asiamanagement_output_header')){
	function asiamanagement_output_header(){
		get_header();
	}
}

if (!function_exists('asiamanagement_output_header_content')){
	function asiamanagement_output_header_content(){
		get_template_part('template-parts/header/content', 'header');
	}
}

if (!function_exists('asiamanagement_output_footer')){
	function asiamanagement_output_footer(){
		get_footer();
	}
}

if (!function_exists('asiamanagement_output_footer_content')){
	function asiamanagement_output_footer_content(){
		get_template_part('template-parts/footer/content', 'footer');
	}
}

/*==================================================================================================
  Hooks
  ==================================================================================================*/


/**
 * Metas and Links
 * @see  asiamanagement_add_meta()
 * @see  asiamanagement_add_links()
 */
add_action( 'asiamanagement_meta', 'asiamanagement_add_meta' );
add_action( 'asiamanagement_links', 'asiamanagement_add_links' );

/**
* Header / Footer Content
* @see asiamanagement_output_header_content()
* @see asiamanagement_output_footer_content()
*/
 add_action('asiamanagement_header_content', 'asiamanagement_output_header_content', 10);
 add_action('asiamanagement_footer_content', 'asiamanagement_output_footer_content', 10);

/**
 * Header / Footer  
 */
add_action( 'asiamanagement_header', 'asiamanagement_output_header');
add_action( 'asiamanagement_footer', 'asiamanagement_output_footer');

/**
 * Testimonials
 */


?>

