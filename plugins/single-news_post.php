<?php
/*
Plugin Name: Custom News Post Plugin
Description: Custom post for all news types - publications / surveys / events / circular
Version: 1.0
Author: Allana Kennedy
*/



function custom_post_news_plugin()
{
$labels = array(
'name' => 'News',
'singular_name' => 'News',
'menu_name' => 'News',
'add_new' => 'Add New',
'add_new_item' => 'Add New Custom Post',
'edit' => 'Edit',
'edit_item' => 'Edit Custom Post',
'new_item' => 'New Custom Post',
'view' => 'View',
'view_item' => 'View Custom Post',
'search_items' => 'Search Custom Posts',
'not_found' => 'No custom posts found',
'not_found_in_trash' => 'No custom posts found in trash',
'parent' => 'Parent Custom Post'
);

$args = array(
'labels' => $labels,
'public' => true,
'has_archive' => true,
'publicly_queryable' => true,
'query_var' => true,
'rewrite' => array('slug' => 'news-post'),
'capability_type' => 'post',
'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
'taxonomies' => array('category', 'post_tag', 'publications', 'surveys', 'events', 'circular'), // Add taxonomies if needed
'menu_position' => 5,
'menu_icon' => 'dashicons-admin-post', // Customize the menu icon
'show_in_rest' => true // Enable Gutenberg editor support
);

register_post_type('news_post', $args);
}
add_action('init', 'custom_post_news_plugin');