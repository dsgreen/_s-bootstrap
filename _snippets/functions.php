<?php

/*
 * place in function _s_setup() {}
 */
// support for custom image sizes (example)
add_image_size( 'xyz-sm', 100, 100 );
add_image_size( 'xyz-md', 300, 300 );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'grid-sm' => __( 'XYZ SM' ),
				'grid-md' => __( 'XYZ MD' )
		) );
}
/*
 * Enable support for Post Formats.
 * See https://developer.wordpress.org/themes/functionality/post-formats/
 */
add_theme_support( 'post-formats', array(
	'aside',
	'image',
	'video',
	'quote',
	'link',
) );

/**
 * Custom post type example.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function _s_project_post_type() {
	register_post_type( '_s_projects',
		array(
			'labels' => array(
				'name'               => __( 'Projects', '_s' ),
				'singular_name'      => __( 'Project',  '_s' ),
				'menu_name'          => __( 'Projects', '_s' ),
				'name_admin_bar'     => __( 'Project',  '_s' ),
				'all_items'          => __( 'All Projects', '_s' ),
				'add_new'            => __( 'Add New',  '_s' ),
				'add_new_item'       => __( 'Add New Project',  '_s' ),
				'edit_item'          => __( 'Edit Project',  '_s' ),
				'new_item'           => __( 'New Project',  '_s' ),
				'view_item'          => __( 'View Project',  '_s' ),
				'search_items'       => __( 'Search Projects', '_s' ),
				'not_found'          => __( 'No Projects found', '_s' ),
				'not_found_in_trash' => __( 'No Projects found in Trash', '_s' ),
				'parent_item_colon'  => __( 'Parent Project', '_s' )
			),
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-page',
			'capability_type'     => 'post',
			'hierarchical'        => true,
			'supports'            => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				//'comments',
				'revisions',
				'page-attributes'
				//'post-formats'
				//'genesis-seo'
			),
			'has_archive'         => true,
			'rewrite'             => array(
				'slug' => 'projects',
				'with_front' => false
			),
			'query_var'           => true,
			'can_export'          => true
		)
	);
}
add_action( 'init', '_s_project_post_type' );

function _s_create_taxonomies() {

	// Add a taxonomy like categories
	$labels = array(
		'name'              => 'Project Categories',
		'singular_name'     => 'Project Category',
		'menu_name'         => 'Project Categories',
		'all_items'         => 'All Project Categories',
		'edit_item'         => 'Edit Project Category',
		'view_item'         => 'View Project Category',
		'update_item'       => 'Update Project Category',
		'add_new_item'      => 'Add New Project Category',
		'new_item_name'     => 'New Project Category Name',
		'parent_item'       => 'Parent Project Category',
		'parent_item_colon' => 'Parent Project Category:',
		'search_items'      => 'Search Project Categories',
		'not_found'         => 'No Project Categories found.'
	);
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'project-category'
		)
	);
	register_taxonomy( '_s_project_category', array('_s_projects'), $args );

	// Add a taxonomy like tags
	$labels = array(
		'name'                       => 'Project Tags',
		'singular_name'              => 'Project Tag',
		'menu_name'                  => 'Project Tags',
		'all_items'                  => 'All Project Tags',
		'edit_item'                  => 'Edit Project Tag',
		'view_item'                  => 'View Project Tag',
		'update_item'                => 'Update Project Tag',
		'add_new_item'               => 'Add New Project Tag',
		'new_item_name'              => 'New Project Tag Name',
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'search_items'               => 'Search Project Tags',
		'popular_items'              => 'Popular Project Tags',
		'separate_items_with_commas' => 'Separate Project Tags with commas',
		'add_or_remove_items'        => 'Add or remove Project Tags',
		'choose_from_most_used'      => 'Choose from most used Project Tags',
		'not_found'                  => 'No Project Tags found'
	);
	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'hierarchical'          => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'project-tag'
		)
	);
	register_taxonomy( '_s_project_tag', '_s_projects', $args );
}
add_action( 'init', '_s_create_taxonomies' );
register_taxonomy_for_object_type( '_s_project_category', '_s_projects' );
register_taxonomy_for_object_type( '_s_project_tag', '_s_projects' );
