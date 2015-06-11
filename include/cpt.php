<?php

function cptui_register_generic_cpt($name, $plural_name) {
    if(!isset($plural_name) || $plural_name == "") {
        $plural_name = $name . "s";
    }
    if(ctype_upper($name)) {
        $up_name = $name;
        $up_plural_name = $plural_name;
    } else {
        $up_name = ucwords($name);
        $up_plural_name = ucwords($plural_name);
    }
    $down_name = preg_replace('/\s+/', '_', strtolower($name));
    //$down_plural_name = preg_replace('/\s+/', '_', strtolower($plural_name));
    register_post_type($down_name, array(
        'label' => $down_name,
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array(
            'slug' => $down_name,
            'with_front' => true
        ),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
            'post-formats',
            'wpcom-markdown'
        ),
        'labels' => array(
            'name' => $up_plural_name,
            'singular_name' => $up_name,
            'menu_name' => $up_plural_name,
            'add_new' => 'Add ' . $up_name,
            'add_new_item' => 'Add New ' . $up_name,
            'edit' => 'Edit',
            'edit_item' => 'Edit ' . $up_name,
            'new_item' => 'New ' . $up_name,
            'view' => 'View ' . $up_plural_name,
            'view_item' => 'View ' . $up_plural_name,
            'search_items' => 'Search ' . $up_plural_name,
            'not_found' => 'No ' . $up_plural_name . ' Found',
            'not_found_in_trash' => 'No ' . $up_plural_name . ' Found in Trash',
            'parent' => 'Parent ' . $up_name,
        )
    ));
}

function cptui_register_my_cpt_faq() {
    cptui_register_generic_cpt("FAQ", "");
}

add_action('init', 'cptui_register_my_cpt_faq');

// custom post types with specific toggles
add_action('init', function() {
    // piecse of the experience page
    register_post_type('themepage', array(
        'label' => 'themepage',
        'description' => '',
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        // these apparently block front end visibility
        // along with making the creation of new posts impossible
        'hierarchical' => false,
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => false,
        'capabilities' => array('create_posts' => false, ),
        'rewrite' => array(
            'slug' => 'themepage',
            'with_front' => true
        ),
        'query_var' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
            'post-formats',
            'wpcom-markdown'
        ),
        'labels' => array(
            'name' => 'Theme Pages',
            'singular_name' => 'Theme Page',
            'menu_name' => 'Theme Pages',
            'add_new' => 'Add New Theme Page',
            'add_new_item' => 'Add New Theme Page',
            'edit' => 'Edit',
            'edit_item' => 'Edit Theme Page',
            'new_item' => 'New Theme Page',
            'view' => 'View Theme Pages',
            'view_item' => 'View Theme Page',
            'search_items' => 'Search Theme Pages',
            'not_found' => 'No Theme Pages Found',
            'not_found_in_trash' => 'No Theme Pages Found in Trash',
            'parent' => 'Parent Theme Pages',
        )
    ));

});

$pieces = array();
include 'prepopulate.php';

foreach($pieces as $piece) {
    if(!get_page_by_path($piece['post_name'], OBJECT, $piece['post_type'])) {
        wp_insert_post(array(
            'post_name' => $piece['post_name'],
            'post_title' => $piece['post_title'],
            'post_content' => $piece['post_content'],
            'post_status' => 'publish',
            'post_type' => $piece['post_type'],
            'ping_status' => 'closed'
        ), true);
    }
}

$pieces = array(//
    array(
        'post_name' => 'front-page',
        'post_title' => 'The Front Page',
    ), );
foreach($pieces as $piece) {
    if(!get_page_by_path($piece['post_name'], OBJECT, 'themepage')) {
        wp_insert_post(array(
            'post_name' => $piece['post_name'],
            'post_title' => $piece['post_title'],
            'post_content' => 'lorem ipsum',
            'post_status' => 'publish',
            'post_type' => 'themepage',
            'ping_status' => 'closed',
        ), true);
    }

}
?>