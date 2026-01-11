<?php

add_theme_support( 'post-thumbnails' );

add_action('wp_head', 'nightime_head');
add_action( 'wp_enqueue_scripts', 'nightime_enqueue_style' );

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

function nightime_head() {
// Your custom code here
echo '<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
';
}

function nightime_enqueue_style() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Jolly+Lodger&display=swap');
    wp_enqueue_style( 'nightime-style', get_stylesheet_uri() );
}

/* Better way to add multiple widgets areas */
function nightime_widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
    register_sidebar( array(
        'name' => $name,
        'id' => $id,
        'description' => $description,
        'before_widget' => $beforeWidget,
        'after_widget' => $afterWidget,
        'before_title' => $beforeTitle,
        'after_title' => $afterTitle,
    ));
}

function nightime_multiple_widget_init(){
    nightime_widget_registration('Main Page Sidebar', 'main-page-sidebar', 'Sidebar on front page', '<div class="main-widget">', '</div>', '', '');
    nightime_widget_registration('Inner Page Sidebar', 'inner-page-sidebar', 'Sidebar on inner pages', '', '', '', '');
    nightime_widget_registration('Blog Post Sidebar', 'blog-post-sidebar', 'Sidebar on blog posts', '', '', '', '');
// ETC...
}

add_action('widgets_init', 'nightime_multiple_widget_init');


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
add_action( 'init', 'clients_post_type', 0 );

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
add_action( 'init', 'client_taxonomy', 0 );

if( is_admin() ) {
    add_filter( 'enter_title_here', function( $input ) {
        if( 'client' === get_post_type() ) {
            return __( 'Enter Client Name', 'nta' );
        } else {
            return $input;
        }
    } );
}

