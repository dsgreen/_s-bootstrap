<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

    // support for custom image sizes (example)
    /*
    add_image_size( 'xyz-sm', 100, 100 );
    add_image_size( 'xyz-md', 300, 300 );

    add_filter( 'image_size_names_choose', 'my_custom_sizes' );
    function my_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'grid-sm' => __( 'XYZ SM' ),
            'grid-md' => __( 'XYZ MD' )
        ) );
    }
    */

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', '_s' ),
	) );

	// Register Custom Navigation Walker
	require_once('wp_bootstrap_navwalker.php');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Hide WordPress version number in HTML source
    add_filter( 'the_generator', '__return_null' );

}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

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

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
    // Bootstrap from CDN
    wp_enqueue_style( 'bootstrap-3.3.7', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7' );
    // plugin styles (example)
    // could opt to put in header-{custom}.php files if not used on every page, or leave here if not too big a file load
    //wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/your-custom.css', array(), '1.0.0' );
    // _s/main site styles (follows Bootstrap & plugins in case any overrides in main site styles)
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );
    // Modernizr (SVG, media query, add CSS classes, Modernizr.testStyles() build)
    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.custom.07230.js', array(), '2.8.3' );
    // footer scripts follow, default _s scripts first
    //wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	//wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    // not using jQuery dependency, WordPress adds it to header by default, we want it in the footer and we're also using CDN
    // at least 1.9.1 needed: https://github.com/twbs/bootstrap/blob/v3.3.4/bower.json
    wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-1.12.4.min.js', array(), '1.12.4', TRUE );
    // Bootstrap JS from CDN
    wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.3.7', TRUE );
    // plugin scripts, followed by main site script
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), '20150521', TRUE );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
