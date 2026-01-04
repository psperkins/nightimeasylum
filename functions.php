<?php

add_action('wp_head', 'nightime_head');
add_action( 'wp_enqueue_scripts', 'nightime_enqueue_style' );

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