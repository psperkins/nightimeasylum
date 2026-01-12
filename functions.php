<?php

require_once(dirname( __FILE__ ) . '/src/post-types.php');
require_once(dirname( __FILE__ ) . '/src/fields.php');

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'clients_post_type', 0 );
add_action( 'init', 'client_taxonomy', 0 );
add_action('widgets_init', 'nightime_multiple_widget_init');
add_action('wp_head', 'nightime_head');
add_action( 'wp_enqueue_scripts', 'nightime_enqueue_style' );


if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

function nightime_head() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    ';
}

function nightime_enqueue_style() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Jolly+Lodger&display=swap');
    wp_enqueue_style( 'nightime-style', get_stylesheet_uri() );
}

add_action( 'admin_enqueue_scripts', 'nta_admin_style', 90 );
function nta_admin_style() {
    wp_register_style( 'nta_admin_css', get_template_directory_uri() . '/css/nta_admin.css', false, '1.0.0' );
    //OR
    wp_enqueue_style( 'nta_admin_css', get_template_directory_uri() . '/css/nya_admin.css', false, '1.0.0' );
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

function nightime_multiple_widget_init()
{
    nightime_widget_registration('Main Page Sidebar', 'main-page-sidebar', 'Sidebar on front page', '<div class="main-widget">', '</div>', '', '');
    nightime_widget_registration('Inner Page Sidebar', 'inner-page-sidebar', 'Sidebar on inner pages', '', '', '', '');
    nightime_widget_registration('Blog Post Sidebar', 'blog-post-sidebar', 'Sidebar on blog posts', '', '', '', '');
// ETC...
}

add_filter( 'post_type_labels_post', 'news_rename_labels' );

/**
 * Rename default post type to news
 *
 * @param object $labels
 * @hooked post_type_labels_post
 * @return object $labels
 */
function news_rename_labels( $labels )
{
    # Labels
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'New News';
    $labels->view_item = 'View News';
    $labels->view_items = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No news found.';
    $labels->not_found_in_trash = 'No news found in Trash.';
    $labels->parent_item_colon = 'Parent news'; // Not for "post"
    $labels->archives = 'News Archives';
    $labels->attributes = 'News Attributes';
    $labels->insert_into_item = 'Insert into news';
    $labels->uploaded_to_this_item = 'Uploaded to this news';
    $labels->featured_image = 'Featured Image';
    $labels->set_featured_image = 'Set featured image';
    $labels->remove_featured_image = 'Remove featured image';
    $labels->use_featured_image = 'Use as featured image';
    $labels->filter_items_list = 'Filter news list';
    $labels->items_list_navigation = 'News list navigation';
    $labels->items_list = 'News list';

    # Menu
    $labels->menu_name = 'News';
    $labels->all_items = 'All News';
    $labels->name_admin_bar = 'News';

    return $labels;
}

function reorder_admin_menu() {
    return array(
        'index.php', // Dashboard
        'edit.php', // Posts
        'edit.php?post_type=client', // Pages
        'edit.php?post_type=page', // Pages
        'upload.php', // Media
        'themes.php', // Appearance
        'separator1', // --Space--
        'edit-comments.php', // Comments
        'users.php', // Users
        'separator2', // --Space--
        'plugins.php', // Plugins
        'tools.php', // Tools
        'options-general.php', // Settings
    );
}
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'reorder_admin_menu');