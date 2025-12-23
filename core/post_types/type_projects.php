<?php
class Register_Industries_Post_Type {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_industries_post_type' ) );
        add_action( 'init', array( $this, 'register_industry_categories' ) ); // Register custom taxonomy
    }

    /**
     * Register a custom post type called "industry".
     */
    public function register_industries_post_type() {
        $labels = array(
            'name'               => 'Industries',
            'singular_name'      => 'Industry',
            'menu_name'          => 'Industries',
            'name_admin_bar'     => 'Industry',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Industry',
            'new_item'           => 'New Industry',
            'edit_item'          => 'Edit Industry',
            'view_item'          => 'View Industry',
            'all_items'          => 'All Industries',
            'search_items'       => 'Search Industries',
            'not_found'          => 'No Industries found.',
            'not_found_in_trash' => 'No Industries found in Trash.',
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-portfolio',
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'has_archive'        => true,
            'rewrite'            => array( 'slug' => 'industries' ),
            'taxonomies'         => array( 'industry_category' ), // Associate taxonomy
        );

        register_post_type( 'industry', $args );
    }

    /**
     * Register the custom taxonomy for 'industry'.
     */
    public function register_industry_categories() {
        $labels = array(
            'name'              => 'Industry Categories',
            'singular_name'     => 'Industry Category',
            'search_items'      => 'Search Industry Categories',
            'all_items'         => 'All Industry Categories',
            'parent_item'       => 'Parent Industry Category',
            'parent_item_colon' => 'Parent Industry Category:',
            'edit_item'         => 'Edit Industry Category',
            'update_item'       => 'Update Industry Category',
            'add_new_item'      => 'Add New Industry Category',
            'new_item_name'     => 'New Industry Category Name',
            'menu_name'         => 'Industry Categories',
        );

        $args = array(
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'industry-category' ),
        );

        // Register the taxonomy and associate it with the 'industry' post type
        register_taxonomy( 'industry_category', array( 'industry' ), $args );
    }
}

// Instantiate the class to trigger registration.
new Register_Industries_Post_Type();
?>
