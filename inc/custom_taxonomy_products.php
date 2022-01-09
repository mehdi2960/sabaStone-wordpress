<?php

///////////////////////////////////////////////

//----- Register Taxonomy for product ------//

///////////////////////////////////////////////

function wewa_create_taxonomies()

{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('product Types', 'taxonomy general name'),
        'singular_name'     => _x('product Types', 'taxonomy singular name'),
        'search_items'      => __('Search product Types'),
        'all_items'         => __('All product Types'),
        'parent_item'       => __('Parent product Type'),
        'parent_item_colon' => __('Parent product Type:'),
        'edit_item'         => __('Edit product Type'),
        'update_item'       => __('Update product Type'),
        'add_new_item'      => __('Add New product Type'),
        'new_item_name'     => __('New Tour product Name'),
        'menu_name'         => __('product Types', 'wewatd'),
    );
    $args = array(
        'hierarchical'      => true,
        'label'             => 'product Types',
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'product-types'),
    );
    register_taxonomy('product-types', 'products', $args);
}

// hook into the init action and call create_taxonomies when it fires

add_action( 'init', 'wewa_create_taxonomies', 0 );
