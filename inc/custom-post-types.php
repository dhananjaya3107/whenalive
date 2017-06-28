<?php
/**
 * Register a Portfolio post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'whenalive_portfolio_init' );
/**
 *
 */
function whenalive_portfolio_init() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'whenalive-portfolio' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'whenalive-portfolio' ),
        'menu_name'          => _x( 'Portfolio', 'admin menu', 'whenalive-portfolio' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'whenalive-portfolio' ),
        'add_new'            => _x( 'Add New', 'portfolio', 'whenalive-portfolio' ),
        'add_new_item'       => __( 'Add New Project', 'whenalive-portfolio' ),
        'new_item'           => __( 'New Project', 'whenalive-portfolio' ),
        'edit_item'          => __( 'Edit Project', 'whenalive-portfolio' ),
        'view_item'          => __( 'View Project', 'whenalive-portfolio' ),
        'all_items'          => __( 'All Projects', 'whenalive-portfolio' ),
        'search_items'       => __( 'Search Projects', 'whenalive-portfolio' ),
        'parent_item_colon'  => __( 'Parent Projects:', 'whenalive-portfolio' ),
        'not_found'          => __( 'No Projects found.', 'whenalive-portfolio' ),
        'not_found_in_trash' => __( 'No Projects found in Trash.', 'whenalive-portfolio' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'whenalive-portfolio' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'agency' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail')
    );

    register_post_type( 'portfolio', $args );
}

