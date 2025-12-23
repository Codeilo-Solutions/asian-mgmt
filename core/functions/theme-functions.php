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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-v3JnH5oTgq4pWZlVZJ5z0+qPpILiQ7mjVZ1B+lXbwH9R9s0xDsVx0+XyLcnJ7gFhMHhR+KzTRbqYSm6MjU0O9Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.tailwindcss.com"></script>
   
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
