<?php
/**
 * asiamanagement enqueue functions and definitions
 *
 * @package asiamanagement
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function dignity_scripts() {

    // Deregister WordPress jQuery and register your own version in the header
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        'https://code.jquery.com/jquery-3.6.1.min.js',
        array(),
        '3.6.1',
        false // load in header, required by Owl Carousel
    );

    // AOS Animation CSS & JS
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), '2.3.4');
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), '2.3.4', true);
    wp_add_inline_script('aos-js', 'AOS.init();', 'after');

    // Tailwind and custom CSS
    wp_enqueue_style('asiamanagement-splide-css', DK_CSS . '/splide.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('asiamanagement-main-css', DK_CSS . '/style.css', array(), '1.0.0', 'all');
    // wp_enqueue_style('asiamanagement-custom-css', DK_CSS . '/tw.css', array(), '1.0.0', 'all');

    // Owl Carousel CSS & JS
    wp_enqueue_style(
        'owl-carousel-css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        array(),
        '2.3.4'
    );
    wp_enqueue_style(
        'owl-carousel-theme-css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
        array('owl-carousel-css'),
        '2.3.4'
    );
    wp_enqueue_script(
        'owl-carousel-js',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
        array('jquery'),
        '2.3.4',
        true
    );

    // Main JS
    wp_enqueue_script('asiamanagement-main-js', DK_JS . '/main.js', array('jquery', 'owl-carousel-js'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'dignity_scripts');
