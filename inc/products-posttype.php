<?php

function productIndex()
{

    $labels = array(
        'name' => __('products', 'wewatd'),
        'singular_name' => __('products', 'wewatd'),
        'menu_name' => 'products',
        'name_admin_bar' => 'product',
        'add_new' => 'Add product',
        'add_new_item' => 'Add product Item',
        'new_item' => 'New product',
        'edit_item' => 'Edit product',
        'view_item' => 'View product',
        'all_items' => 'All products',
        'search_items' => 'Search products',
        'parent_item_colon' => 'Parent product',
        'not_found' => 'No product found',
        'not_found_in_trash' => 'No product found in trash',
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'wewatd'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('product-types'),
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'products'),
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-schedule',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
    );

    register_post_type('products', $args);
}

add_action('init', 'productIndex');
