<?php
/**
 * UnderBoot functions and definitions
 *
 * @package UnderBoot
 */

if ( ! function_exists( 'under_boot_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function under_boot_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on UnderBoot, use a find and replace
	 * to change 'under-boot' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'under-boot', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
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
		'primary' => esc_html__( 'Primary Menu', 'under-boot' ),
	) );

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
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
    /*
	add_theme_support( 'custom-background', apply_filters( 'under_boot_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    */

    // Hide WordPress version in HTML source
    add_filter( 'the_generator', '__return_null' );

}
endif; // under_boot_setup
add_action( 'after_setup_theme', 'under_boot_setup' );

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
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function under_boot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'under-boot' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'under_boot_widgets_init' );

/**
 * Custom post type example.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function under_boot_project_post_type() {
    register_post_type( 'ub_projects',
        array(
            'labels' => array(
                'name'               => __( 'Projects', 'under-boot' ),
                'singular_name'      => __( 'Project',  'under-boot' ),
                'menu_name'          => __( 'Projects', 'under-boot' ),
                'name_admin_bar'     => __( 'Project',  'under-boot' ),
                'all_items'          => __( 'All Projects', 'under-boot' ),
                'add_new'            => __( 'Add New',  'under-boot' ),
                'add_new_item'       => __( 'Add New Project',  'under-boot' ),
                'edit_item'          => __( 'Edit Project',  'under-boot' ),
                'new_item'           => __( 'New Project',  'under-boot' ),
                'view_item'          => __( 'View Project',  'under-boot' ),
                'search_items'       => __( 'Search Projects', 'under-boot' ),
                'not_found'          => __( 'No Projects found', 'under-boot' ),
                'not_found_in_trash' => __( 'No Projects found in Trash', 'under-boot' ),
                'parent_item_colon'  => __( 'Parent Project', 'under-boot' )
            ),
            'public'              => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 20,
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
add_action( 'init', 'under_boot_project_post_type' );

/**
 * Enqueue scripts and styles.
 */
function under_boot_scripts() {
    // Bootstrap from CDN
    wp_enqueue_style( 'bootstrap-3.3.4', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', array(), '3.3.4' );
    // various plugin styles (example)
    // could opt to put in header-{custom}.php files if not used on every page, or leave here if not too big a file load
    // RoyalSlider/Magnific Popup: http://dimsemenov.com
    /*
    wp_enqueue_style( 'royalslider', get_template_directory_uri()    . '/js/royalslider/royalslider.css', array(), '9.5.7' );
    wp_enqueue_style( 'rs-default', get_template_directory_uri()     . '/js/royalslider/skins/default/rs-default.css', array(), '9.5.7' );
    wp_enqueue_style( 'rs-custom', get_template_directory_uri()     . '/js/royalslider/skins/yoursite/your-custom-skin.css', array(), '9.5.7' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0.0' );
    */
    // underscores/site styles (follows bootstrap & plugins in case any overrides in main site styles)
	wp_enqueue_style( 'main-styles', get_stylesheet_uri() );
    // Modernizr (SVG, media query, add CSS classes, Modernizr.testStyles() build)
    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.custom.07230.js', array(), '2.8.3' );
    // footer scripts
    // underscores scripts
    /*
    wp_enqueue_script( 'under-boot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'under-boot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    */
    // not using jquery dependency, WordPress adds it to header by default, want it in the footer and also using CDN
    // at least 1.9.1 needed: https://github.com/twbs/bootstrap/blob/v3.3.4/bower.json
    wp_enqueue_script( 'jquery_js', '//code.jquery.com/jquery-1.11.3.min.js', array(), '1.11.3', TRUE );
    // jQuery migrate plugin if needed
    // wp_enqueue_script( 'jquery_js', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '1.2.1', TRUE );
    // Bootstrap JS from CDN
    wp_enqueue_script( 'bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array(), '3.3.4', TRUE );
    // add plugin scripts here, followed by main site styles
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), '20150521', TRUE );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'under_boot_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
