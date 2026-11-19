<?php
/**
 *
 * Plugin Name: Liorizik Addon
 * Description: UTS elementor addon
 * Plugin URI:  https://www.echoasoft.com
 * Version:     1.0.0
 * Author:      Ashraf
 * Author URI:  https://www.echoasoft.com/blog
 * Text Domain: offsidebar
 */

define( 'ELEMENTOR_AWESOMESAUCE', __FILE__ );
define("NEXTSITE", "https://liorizik.vercel.app/");
require plugin_dir_path( ELEMENTOR_AWESOMESAUCE ) . '/inc/endpoint.php';
/**
 * Include the Elementor_Awesomesauce class.
 */
require plugin_dir_path( ELEMENTOR_AWESOMESAUCE ) . 'class-elementor-awesomesauce.php';
/////////////////// Custome Post Type Course ///////////////////////////

function create_course()
{

	register_post_type(
		'course',
		array(
			'labels' => array(

				'name' => 'All Course',
				'singular_name' => 'Course',
				'menu_name' => 'Course',
				'add_new' => 'Add New Course',

				'add_new_item' => 'Add New Course',
				'edit_item' => 'Edit Course',
				'new_item' => 'New Course',
				'view_item' => 'View Course',
				'view_items' => 'Views Course',
				'search_items' => 'Search Course',

				'not_found' => 'Not Found Course',
				'not_found_in_trash' => 'Not Found Trush Course',
				'parent_item_colon' => 'Parent Colon Course',
				'all_items' => 'All Course',
				'archives' => 'Archives Course',
				'attributes' => 'Attributes Course',
				'insert_into_item' => 'Insert Course',
				'uploaded_to_this_item' => 'Upload Course',
				'featured_image' => 'Featured Course',
				'set_featured_image' => 'Set Featured Course',
				'remove_featured_image' => 'Remove Featured Course',
				'use_featured_image' => 'Use Featured Course',

				'filter_items_list' => 'Filter Course',
				'items_list_navigation' => 'Item List Nav Course',
				'items_list' => 'Item List Course',
				'name_admin_bar' => 'Admin Course',

			),
			'public' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'course',	
			'graphql_plural_name' => 'courses',			
			'has_archive' => true,
			'rewrite' => array('slug' => 'course'),
			'show_in_menu' => true,
			'menu_position' => 10,
			'menu_icon' => "dashicons-buddicons-buddypress-logo",
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}

add_action('init', 'create_course');

///////////////////// Course Taxnomy ///////////////////////////////////

function create_course_cat()
{

	$labels = array(
		'name'                       => _x('Course Category', 'taxonomy general name', 'textdomain'),
		'singular_name'              => _x('Course Category', 'taxonomy singular name', 'textdomain'),
		'search_items'               => __('Search Course Categories', 'textdomain'),
		'popular_items'              => __('Popular Course Categories', 'textdomain'),
		'all_items'                  => __('All Course Categories', 'textdomain'),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __('Edit Course Categories', 'textdomain'),
		'update_item'                => __('Update Course Categories', 'textdomain'),
		'add_new_item'               => __('Add New Course Category', 'textdomain'),
		'new_item_name'              => __('New Course Category', 'textdomain'),
		'separate_items_with_commas' => __('Separat Course Categories with commas', 'textdomain'),
		'add_or_remove_items'        => __('Add or remove Course Categories', 'textdomain'),
		'choose_from_most_used'      => __('Choose from the most used Course Categories', 'textdomain'),
		'not_found'                  => __('No Course Categories found.', 'textdomain'),
		'menu_name'                  => __('Course Categories', 'textdomain'),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array('slug' => 'course_cat'),
	);

	register_taxonomy('course_cat', 'course', $args);
}

add_action('init', 'create_course_cat');