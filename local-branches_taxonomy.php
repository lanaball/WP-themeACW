<?php
/*
Plugin Name: Local Branches Taxonomy
Description: Custom Taxonomy for all local branches
Version: 1.0
Author: Allana Kennedy
*/

function custom_local_branches_taxonomy()
{
    $labels = array(
        'name'              => _x('Local Branches', 'taxonomy general name'),
        'singular_name'     => _x('Local Branch', 'taxonomy singular name'),
        'search_items'      => __('Search Local Branches'),
        'all_items'         => __('All Local Branches'),
        'parent_item'       => __('Parent Local Branch'),
        'parent_item_colon' => __('Parent Local Branch:'),
        'edit_item'         => __('Edit Local Branch'),
        'update_item'       => __('Update Local Branch'),
        'add_new_item'      => __('Add New Local Branch'),
        'new_item_name'     => __('New Local Branch Name'),
        'menu_name'         => __('Local Branches'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'local-branches'),
    );

    register_taxonomy('local-branches', array('post'), $args);
}
add_action('init', 'custom_local_branches_taxonomy');