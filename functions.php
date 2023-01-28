<?php
/**
 * Fall River Hotel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fall_River_Hotel
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
include 'inc/gutenblock.php';

function fall_river_hotel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Fall River Hotel, use a find and replace
		* to change 'fall-river-hotel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fall-river-hotel', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			//'menu-1' => esc_html__( 'Primary', 'fall-river-hotel' ),
			'main-menu' => esc_html__('Main menu', 'fall-river-hotel'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fall_river_hotel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Register Custom Navigation Walker
	 */
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
		// File does not exist... return an error.
		return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
	} else {
		// File exists... require it.
		return require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	}
}
add_action( 'after_setup_theme', 'fall_river_hotel_setup' );

/**
 * bootstrap 5 wp_nav_menu walker
 */
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu {
	private $current_item;
	private $dropdown_menu_alignment_values = [
		'dropdown-menu-start',
		'dropdown-menu-end',
		'dropdown-menu-sm-start',
		'dropdown-menu-sm-end',
		'dropdown-menu-md-start',
		'dropdown-menu-md-end',
		'dropdown-menu-lg-start',
		'dropdown-menu-lg-end',
		'dropdown-menu-xl-start',
		'dropdown-menu-xl-end',
		'dropdown-menu-xxl-start',
		'dropdown-menu-xxl-end'
	];

	function start_lvl( &$output, $depth = 0, $args = null ) {
		$dropdown_menu_class[] = '';
		foreach ( $this->current_item->classes as $class ) {
			if ( in_array( $class, $this->dropdown_menu_alignment_values ) ) {
				$dropdown_menu_class[] = $class;
			}
		}
		$indent  = str_repeat( "\t", $depth );
		$submenu = ( $depth > 0 ) ? ' sub-menu' : '';
		$output  .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr( implode( " ", $dropdown_menu_class ) ) . " depth_$depth\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$this->current_item = $item;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names   = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ( $depth && $args->walker->has_children ) {
			$classes[] = 'dropdown-menu dropdown-menu-end';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$active_class   = ( $item->current || $item->current_item_ancestor || in_array( "current_page_parent", $item->classes, true ) || in_array( "current-post-ancestor", $item->classes, true ) ) ? 'active' : '';
		$nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
		$attributes     .= ( $args->walker->has_children ) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fall_river_hotel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fall_river_hotel_content_width', 640 );
}
add_action( 'after_setup_theme', 'fall_river_hotel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fall_river_hotel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fall-river-hotel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fall-river-hotel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__('Footer One', 'fall-river-hotel'),
			'id'            => 'footer_area_one',
			'description'   => esc_html__( 'Add widgets here.', 'fall-river-hotel' ),
			'before_widget' => '<div class="footer-area footer-area-one">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Two', 'fall-river-hotel'),
			'id'            => 'footer_area_two',
			'description'   => esc_html__( 'Add widgets here.', 'fall-river-hotel' ),
			'before_widget' => '<div class="footer-area footer-area-two">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Three', 'fall-river-hotel'),
			'id'            => 'footer_area_three',
			'description'   => esc_html__( 'Add widgets here.', 'fall-river-hotel' ),
			'before_widget' => '<div class="footer-area footer-area-three">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'fall_river_hotel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fall_river_hotel_scripts() {
	
	//wp_register_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',
	// array(), '5.2.2' );
	// wp_enqueue_style('bootstrap-css');
	
	wp_register_style('lineicons', 'https://cdn.lineicons.com/4.0/lineicons.css', array(), '4.0', 'all');
	wp_enqueue_style('lineicons');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.2', 'all');
	wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '5.2.2', 'all');
	wp_enqueue_style('bootstrap-reboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.css', array(), '5.2.2',	'all');
	wp_enqueue_style('bootstrap-utilities', get_template_directory_uri() . '/assets/css/bootstrap-utilities.css', array(), '5.2.2',	'all');

	wp_register_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
	wp_enqueue_style('aos');
	
	wp_enqueue_style( 'fall-river-hotel-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fall-river-hotel-style', 'rtl', 'replace' );
	
	wp_enqueue_style('supports-css', get_template_directory_uri() . '/assets/css/supports.css', array(), _S_VERSION );
	
	if ( function_exists( 'load_customizer_css' ) ) {
		wp_add_inline_style( 'supports-css', load_customizer_css() );
	}

	wp_enqueue_script( 'fall-river-hotel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if(is_page_template('templates/full-width-template.php' || 'templates/recreation-template.php' || 'templates/new-default-feature-header.php' )) {
		wp_enqueue_script( 'scroll-to', get_template_directory_uri() . '/js/scroll-to.js', array(), _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true );
	wp_enqueue_script('bootstrap-js');

	wp_register_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array('jquery'), '2.3.1', true );
	wp_enqueue_script('aos-js');

	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'fall_river_hotel_scripts' );

function enqueue_admin_scripts_styles() {
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/assets/css/admin.css', array(), _S_VERSION, 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts_styles');

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
