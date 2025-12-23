<?php
class Register_Team_Post_Type {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_team_post_type' ) );
        add_action( 'init', array( $this, 'register_team_designation_taxonomy' ) );
    }

    /**
     * Register a custom post type called "team".
     */
    public function register_team_post_type() {
        $labels = array(
            'name'               => 'Teams',
            'singular_name'      => 'Team Member',
            'menu_name'          => 'Teams',
            'name_admin_bar'     => 'Team Member',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Team Member',
            'new_item'           => 'New Team Member',
            'edit_item'          => 'Edit Team Member',
            'view_item'          => 'View Team Member',
            'all_items'          => 'All Team Members',
            'search_items'       => 'Search Team Members',
            'not_found'          => 'No Team Members found.',
            'not_found_in_trash' => 'No Team Members found in Trash.',
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-groups',
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'has_archive'        => true,
            'rewrite'            => array( 'slug' => 'team' ),
            'taxonomies'         => array( 'designation' ), // Associate taxonomy
        );

        register_post_type( 'team', $args );
    }

    /**
     * Register the custom taxonomy for team designation.
     */
    public function register_team_designation_taxonomy() {
        $labels = array(
            'name'              => 'Designations',
            'singular_name'     => 'Designation',
            'search_items'      => 'Search Designations',
            'all_items'         => 'All Designations',
            'parent_item'       => 'Parent Designation',
            'parent_item_colon' => 'Parent Designation:',
            'edit_item'         => 'Edit Designation',
            'update_item'       => 'Update Designation',
            'add_new_item'      => 'Add New Designation',
            'new_item_name'     => 'New Designation Name',
            'menu_name'         => 'Designations',
        );

        $args = array(
            'hierarchical'      => true, // Allows parent-child relationship
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'designation' ),
        );

        register_taxonomy( 'designation', array( 'team' ), $args );
    }
}

// Instantiate the class
new Register_Team_Post_Type();
?>
