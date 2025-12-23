<?php
class Register_Services_Post_Type {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_services_post_type' ) );
    }

    /**
     * Register a custom post type called "service".
     */
    public function register_services_post_type() {
        $labels = array(
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'menu_name'          => 'Services',
            'name_admin_bar'     => 'Service',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Service',
            'new_item'           => 'New Service',
            'edit_item'          => 'Edit Service',
            'view_item'          => 'View Service',
            'all_items'          => 'All Services',
            'search_items'       => 'Search Services',
            'not_found'          => 'No Services found.',
            'not_found_in_trash' => 'No Services found in Trash.',
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-portfolio',
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'has_archive'        => true,
            'rewrite'            => array( 'slug' => 'services' ),
        );

        register_post_type( 'service', $args );
    }
}

// Instantiate the class to trigger the constructor and register the post type.
new Register_Services_Post_Type();
?>
