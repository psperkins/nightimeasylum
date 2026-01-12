<?php

// Register Custom Post Type
function clients_post_type() {

    $labels = array(
        'name'                  => _x( 'Clients', 'Post Type General Name', 'nta' ),
        'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'nta' ),
        'menu_name'             => __( 'Clients', 'nta' ),
        'name_admin_bar'        => __( 'Clients', 'nta' ),
        'archives'              => __( 'Client Archives', 'nta' ),
        'attributes'            => __( 'Client Attributes', 'nta' ),
        'parent_item_colon'     => __( 'Parent Item:', 'nta' ),
        'all_items'             => __( 'All Clients', 'nta' ),
        'add_new_item'          => __( 'Add New Client', 'nta' ),
        'add_new'               => __( 'Add New', 'nta' ),
        'new_item'              => __( 'New Client', 'nta' ),
        'edit_item'             => __( 'Edit Client', 'nta' ),
        'update_item'           => __( 'Update Client', 'nta' ),
        'view_item'             => __( 'View Client', 'nta' ),
        'view_items'            => __( 'View Clients', 'nta' ),
        'search_items'          => __( 'Search Client', 'nta' ),
        'not_found'             => __( 'Not found', 'nta' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'nta' ),
        'featured_image'        => __( 'Featured Image', 'nta' ),
        'set_featured_image'    => __( 'Set featured image', 'nta' ),
        'remove_featured_image' => __( 'Remove featured image', 'nta' ),
        'use_featured_image'    => __( 'Use as featured image', 'nta' ),
        'insert_into_item'      => __( 'Insert into item', 'nta' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'nta' ),
        'items_list'            => __( 'Items list', 'nta' ),
        'items_list_navigation' => __( 'Items list navigation', 'nta' ),
        'filter_items_list'     => __( 'Filter items list', 'nta' ),
    );
    $rewrite = array(
        'slug'                  => 'client',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Client', 'nta' ),
        'description'           => __( 'A post type for adding client details', 'nta' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
        'taxonomies'            => array( 'client_type' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'client', $args );
}

// Register Custom Taxonomy
function client_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Client Type', 'Taxonomy General Name', 'nta' ),
        'singular_name'              => _x( 'Client Type', 'Taxonomy Singular Name', 'nta' ),
        'menu_name'                  => __( 'Client Types', 'nta' ),
        'all_items'                  => __( 'All Client Types', 'nta' ),
        'parent_item'                => __( 'Parent', 'nta' ),
        'parent_item_colon'          => __( 'Parent Item:', 'nta' ),
        'new_item_name'              => __( 'New Client Type Name', 'nta' ),
        'add_new_item'               => __( 'Add New Client Type', 'nta' ),
        'edit_item'                  => __( 'Edit Client Type', 'nta' ),
        'update_item'                => __( 'Update Client Type', 'nta' ),
        'view_item'                  => __( 'View Client Type', 'nta' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'nta' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'nta' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'nta' ),
        'popular_items'              => __( 'Popular Items', 'nta' ),
        'search_items'               => __( 'Search Client Types', 'nta' ),
        'not_found'                  => __( 'Not Found', 'nta' ),
        'no_terms'                   => __( 'No items', 'nta' ),
        'items_list'                 => __( 'Items list', 'nta' ),
        'items_list_navigation'      => __( 'Items list navigation', 'nta' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'client_type', array( 'client' ), $args );

}

if( is_admin() ) {
    add_filter( 'enter_title_here', function( $input ) {
        if( 'client' === get_post_type() ) {
            return __( 'Enter Client Name', 'nta' );
        } else {
            return $input;
        }
    } );
}
