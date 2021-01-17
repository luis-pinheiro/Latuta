<?php
/**
 * Theme functions and definitions
 *
 * @package Components_Business
 */
// Define the version so we can easily replace it throughout the theme
define( 'LATUTA_BUSINESS_VERSION', 1.0 );

require_once( 'titan-framework-checker.php' );
/**
 * Enable theme features
 */
add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-nav-walker');       // Enable cleaner nav walker from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable nice search from Soil
add_theme_support('soil-jquery-cdn');       // Enable to load jQuery from the Google CDN

if ( ! function_exists( 'components_business_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function components_business_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Components Business, use a find and replace
	 * to change 'latuta-business' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'latuta-business', get_template_directory() . '/languages' );

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

	add_image_size( 'latuta-business-hero', 1280, 1000, true );
	add_image_size( 'latuta-business-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'latuta_business' ),
		'social'	=>	__( 'Social Menu', 'latuta_business' ),

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
	add_theme_support( 'custom-background', apply_filters( 'components_business_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // components_business_setup
add_action( 'after_setup_theme', 'components_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function components_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'components_business_content_width', 640 );
}
add_action( 'after_setup_theme', 'components_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function components_business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'latuta-business' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'nav_footer_links', 					// Make an ID
		'name' => 'Sidebar Footer L',				// Name it
		'description' => 'Footer Links', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));

	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'nav_footer_middle', 					// Make an ID
		'name' => 'Sidebar Footer M',				// Name it
		'description' => 'Footer Middle', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));

	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'nav_footer_rechts', 					// Make an ID
		'name' => 'Sidebar Footer R',				// Name it
		'description' => 'Footer Rechts', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
}
add_action( 'widgets_init', 'components_business_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function components_business_scripts() {
	wp_enqueue_style( 'latuta-business-style', get_stylesheet_uri() );

	wp_enqueue_script( 'latuta-business-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'latuta-business-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_style( 'lsm-style', get_template_directory_uri() . '/dist/styles/main.css', false, null);

	wp_enqueue_style('material-icons', 'http://fonts.googleapis.com/icon?family=Material+Icons', false, null);

	wp_enqueue_style('greatvibes', 'https://fonts.googleapis.com/css?family=Great+Vibes', false, null);
    
    wp_enqueue_style('lato', 'https://fonts.googleapis.com/css?family=Lato:400,700', false, null);

    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,600', false, null);
    
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, null);

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/dist/scripts/modernizr.js', [], null, true);
	
  	wp_enqueue_script('sage_js', get_template_directory_uri() . '/dist/scripts/main.js', ['jquery'], null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'components_business_scripts' );

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


/**
 * Titanframework
 */
add_action( 'tf_create_options', 'mytheme_create_options' );
function mytheme_create_options() {
	// We create all our options here
	$titan = TitanFramework::getInstance( 'latuta_business' );

	$section = $titan->createThemeCustomizerSection( array(
		'name' => __( 'Footer Colors', 'latuta_business' ),

	) );
	$section->createOption( array(
		'name' => __( 'Background Color', 'latuta_business' ),
		'id' => 'footer_bg',
		'type' => 'color',
		'default' => '#222222',
		'css' => 'footer { background: value }',
	) );
}
