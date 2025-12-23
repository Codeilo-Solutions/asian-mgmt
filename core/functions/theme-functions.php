<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package asiamanagement
 */

if ( ! function_exists( 'asiamanagement_add_meta' ) ) :
    /**
     * Add meta tags for character set and viewport.
     */
    function asiamanagement_add_meta() {
        echo '<meta charset="UTF-8" />';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
    }
endif;
add_action( 'wp_head', 'asiamanagement_add_meta' );

if ( ! function_exists( 'asiamanagement_add_links' ) ) :
    /**
     * Add favicon and preload fonts.
     */
    function asiamanagement_add_links() {
        ?>
        <!-- <link rel="icon" type="image/x-icon" href="<?php echo esc_url( DK_ASSEST_URI . '/images/logo.svg' ); ?>" /> -->
        <script src="https://cdn.tailwindcss.com"></script>
    <!-- GSAP for Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&family=DIN+Alternate:wght@700&display=swap" rel="stylesheet">

   <script type="importmap">
{
  "imports": {
    "react": "https://esm.sh/react@^19.2.3",
    "react-dom/": "https://esm.sh/react-dom@^19.2.3/",
    "react/": "https://esm.sh/react@^19.2.3/"
  }
}
</script>

    <?php

    }
endif;
add_action( 'wp_head', 'asiamanagement_add_links' );

/**
 * Enqueue custom login styles.
 */
function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . esc_url( get_stylesheet_directory_uri() . '/login/custom-login-styles.css' ) . '" />';
}
add_action( 'login_head', 'my_custom_login' );

/**
 * Change the login logo URL to the site's homepage.
 */
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

/**
 * Change the login logo title attribute.
 */
function my_login_logo_url_title() {
    return 'asiamanagement';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Disable WordPress Admin Bar for all users.
 */
add_filter( 'show_admin_bar', '__return_false' );
