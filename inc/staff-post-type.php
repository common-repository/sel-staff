<?php

/**
* Register Custom Post Type & Taxonomy
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists('selt_staff_post_type') ) {

// Register Custom Post Type
function selt_staff_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'selthemes' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'selthemes' ),
		'menu_name'             => __( 'Staff', 'selthemes' ),
		'name_admin_bar'        => __( 'Staff', 'selthemes' ),
		'archives'              => __( 'Staff Archives', 'selthemes' ),
		'attributes'            => __( 'Staff Attributes', 'selthemes' ),
		'parent_item_colon'     => __( 'Parent Staff:', 'selthemes' ),
		'all_items'             => __( 'All Staff', 'selthemes' ),
		'add_new_item'          => __( 'Add New Staff', 'selthemes' ),
		'add_new'               => __( 'Add New Staff', 'selthemes' ),
		'new_item'              => __( 'New Staff', 'selthemes' ),
		'edit_item'             => __( 'Edit Staff', 'selthemes' ),
		'update_item'           => __( 'Update Staff', 'selthemes' ),
		'view_item'             => __( 'View Staff', 'selthemes' ),
		'view_items'            => __( 'View Staff', 'selthemes' ),
		'search_items'          => __( 'Search Staff', 'selthemes' ),
		'not_found'             => __( 'Staff Not found', 'selthemes' ),
		'not_found_in_trash'    => __( 'Staff Not found in Trash', 'selthemes' ),
		'featured_image'        => __( 'Staff Featured Image', 'selthemes' ),
		'set_featured_image'    => __( 'Set staff featured image', 'selthemes' ),
		'remove_featured_image' => __( 'Remove staff featured image', 'selthemes' ),
		'use_featured_image'    => __( 'Use as featured image', 'selthemes' ),
		'insert_into_item'      => __( 'Insert into Staff', 'selthemes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Staff', 'selthemes' ),
		'items_list'            => __( 'Staff list', 'selthemes' ),
		'items_list_navigation' => __( 'Staff list navigation', 'selthemes' ),
		'filter_items_list'     => __( 'Filter Staff list', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                  => 'staff',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Staff', 'selthemes' ),
		'description'           => __( 'Staff', 'selthemes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'selt_staff', $args );

}
add_action( 'init', 'selt_staff_post_type', 0 );

}


if ( ! function_exists( 'selt_staff_group_taxonomy' ) ) {

// Register Custom Taxonomy
function selt_staff_group_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Groups', 'Taxonomy General Name', 'selthemes' ),
		'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', 'selthemes' ),
		'menu_name'                  => __( 'Group', 'selthemes' ),
		'all_items'                  => __( 'All Groups', 'selthemes' ),
		'parent_item'                => __( 'Parent Group', 'selthemes' ),
		'parent_item_colon'          => __( 'Parent Group:', 'selthemes' ),
		'new_item_name'              => __( 'New Group Name', 'selthemes' ),
		'add_new_item'               => __( 'Add New Group', 'selthemes' ),
		'edit_item'                  => __( 'Edit Group', 'selthemes' ),
		'update_item'                => __( 'Update Group', 'selthemes' ),
		'view_item'                  => __( 'View Group', 'selthemes' ),
		'separate_items_with_commas' => __( 'Separate groups with commas', 'selthemes' ),
		'add_or_remove_items'        => __( 'Add or remove groups', 'selthemes' ),
		'choose_from_most_used'      => __( 'Choose from the most used groups', 'selthemes' ),
		'popular_items'              => __( 'Popular Groups', 'selthemes' ),
		'search_items'               => __( 'Search groups', 'selthemes' ),
		'not_found'                  => __( 'Group Not Found', 'selthemes' ),
		'no_terms'                   => __( 'No Groups', 'selthemes' ),
		'items_list'                 => __( 'Groups list', 'selthemes' ),
		'items_list_navigation'      => __( 'Groups list navigation', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                       => 'staff-group',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'selt_staff_group', array( 'selt_staff' ), $args );

}
add_action( 'init', 'selt_staff_group_taxonomy', 0 );

}

?>
