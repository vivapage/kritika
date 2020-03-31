<?php
/**
 * kritika functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kritika
 */

if ( ! function_exists( 'kritika_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kritika_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kritika, use a find and replace
		 * to change 'kritika' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kritika', get_template_directory() . '/languages' );

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
		
		add_image_size( 'home-big', 720, 407, true );
		add_image_size( 'home-small', 239, 135, true );
		add_image_size( 'main-list', 210, 230, true );
		add_image_size( 'mobile-list', 80, 80, true );
		add_image_size( 'mini', 63, 63, true );
		add_image_size( 'section-list', 330, 186, true );
		add_image_size( 'section-list-small', 90, 68, true );
		add_image_size( 'section-popular', 210, 157, true );
		add_image_size( 'category-big', 483, 405, true );
		add_image_size( 'category-small', 236, 202, true );
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'kritika' ),
			'menu-footer' => esc_html__( 'Footer menu', 'kritika' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kritika_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'kritika_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kritika_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kritika_content_width', 640 );
}
add_action( 'after_setup_theme', 'kritika_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kritika_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kritika' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar front', 'kritika' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar category', 'kritika' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-post', 'kritika' ),
		'id'            => 'sidebar-post',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 1', 'kritika' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 2', 'kritika' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 3', 'kritika' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'kritika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'kritika_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kritika_scripts() {
	wp_enqueue_style( 'kritika-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'kritika-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'kritika-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'kritika-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array(), '20151215', true );
	wp_enqueue_script( 'kritika-lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), '20151215', true );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kritika_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function setPostViews( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
	} else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
	}
}

function getPostViews( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			return "0";
	}

	return $count;
}

function my_template_location() {
    return 'template-parts/';
}
add_filter( 'alnp_template_location', 'my_template_location' );