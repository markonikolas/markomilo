<?php
/**
 * Register Poems custom post type
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Init Poems post type
 */
function poems_init() {
	$labels = array(
		'name'                  => _x( 'Poem', 'Post type general name', 'tmcc' ),
		'singular_name'         => _x( 'Poem', 'Post type singular name', 'tmcc' ),
		'menu_name'             => _x( 'Poems', 'Admin Menu text', 'tmcc' ),
		'name_admin_bar'        => _x( 'Poem', 'Add New on Toolbar', 'tmcc' ),
		'add_new'               => __( 'Add New', 'tmcc' ),
		'add_new_item'          => __( 'Add New Poem', 'tmcc' ),
		'new_item'              => __( 'New Poem', 'tmcc' ),
		'edit_item'             => __( 'Edit Poem', 'tmcc' ),
		'view_item'             => __( 'View Poem', 'tmcc' ),
		'all_items'             => __( 'All Poems', 'tmcc' ),
		'search_items'          => __( 'Search Poems', 'tmcc' ),
		'parent_item_colon'     => __( 'Parent Poem:', 'tmcc' ),
		'not_found'             => __( 'No Poems found.', 'tmcc' ),
		'not_found_in_trash'    => __( 'No Poems found in Trash.', 'tmcc' ),
		'featured_image'        => _x( 'Poem Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'tmcc' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'tmcc' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'tmcc' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'tmcc' ),
		'archives'              => _x( 'Poem archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'tmcc' ),
		'insert_into_item'      => _x( 'Insert into Poem', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'tmcc' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Poem', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'tmcc' ),
		'filter_items_list'     => _x( 'Filter Poems list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'tmcc' ),
		'items_list_navigation' => _x( 'Poem list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'tmcc' ),
		'items_list'            => _x( 'Poem list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'tmcc' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-welcome-write-blog',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'poem' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'poem', $args );
}

add_action( 'init', __NAMESPACE__ . '\poems_init' );
