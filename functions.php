<?php
/**
 * mosir functions and definitions
 *
 * @package mosir
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

// ==============================
// Theme setup
// ==============================

if ( ! function_exists( 'mosi_setup' ) ) :
	function mosi_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
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
		add_theme_support( 'custom-logo' );
	}
endif;
add_action( 'after_setup_theme', 'mosi_setup' );


// ==============================
// Enqueues Styles and Scripts
// ==============================

if ( ! function_exists( 'mosi_enqueue_styles' ) ) :
	/**
	 * Enqueues theme.css on the front.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mosi_enqueue_styles() {
		wp_enqueue_style(
			'theme-style',
			get_theme_file_uri( 'assets/css/theme.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'mosi_enqueue_styles' );


if ( ! function_exists( 'mosi_enqueue_scripts' ) ) :
	/**
	 * Enqueues theme.css on the front.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mosi_enqueue_scripts() {
		wp_enqueue_script(
			'theme-script',
			get_theme_file_uri( 'assets/js/theme.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			array( 'strategy'  => 'defer' )
			);
		}
	endif;
add_action( 'wp_enqueue_scripts', 'mosi_enqueue_scripts' );


if ( ! function_exists( 'mosi_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mosi_editor_style() {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'mosi_editor_style' );


if ( ! function_exists( 'mosi_enqueue_block_editor_assets' ) ) :
	/**
	 * Enqueues editor-script.js in the editors.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mosi_enqueue_block_editor_assets() {
		wp_enqueue_script(
			'editor-script',
			get_theme_file_uri( 'assets/js/editor-script.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'mosi_enqueue_block_editor_assets' );


// ==============================
// Menus
// ==============================

if ( ! function_exists( 'mosi_redistar_nav_menu' ) ) :
	/**
	 * Define the menus to use within the theme
	 *
	 * @since mosir 1.0
	 *
	 * @return string
	 */
	function mosi_redistar_nav_menu() {
		register_nav_menus([
			'header_nav_01' => 'Header: Mega nav.',
			'header_nav_02' => 'Header: Horizontal nav.',
			'header_nav_03' => 'Header: Piped nav.',
			'header_nav_04' => 'Header: Buttons.',
			'footer_nav_01' => 'Footer: Sitemap',
			'footer_nav_02' => 'Footer: Horizontal nav.',
			'drawer_nav_01' => 'Drawer: Vertical nav.',
			'drawer_nav_02' => 'Drawer: Sitemap',
			'sticky_nav' => 'Sticky nav.',
		]);
	}
endif;
add_action( 'after_setup_theme', 'mosi_redistar_nav_menu' );


// ==============================
// Compatible WordPress BlockEditor(Gutenberg)
// ==============================

if ( ! function_exists( 'mosi_wp_block_class' ) ) :
	/**
	 * Echo WordPress BlockEditor class name
	 *
	 * @since mosir 1.0
	 *
	 * @param string $before The string to prepend, such as a space.
	 * @param string $after The string to append, such as a space.
	 * @return string
	 */
	function mosi_wp_block_class( $before = '', $after = '' ) {
		echo esc_attr( $before ) . 'wp-block-post-content is-layout-constrained has-global-padding' . esc_attr( $after );
	}
endif;


require_once __DIR__ . '/functions/customizer.php';


if ( !function_exists( 'mosi_widgets_init' ) ) {
	function mosi_widgets_init() {
		register_sidebar( array(
			'name' => 'Sidebar (Post)',
			'id' => 'widget-sidebar-post',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
		) );

		register_sidebar( array(
			'name' => 'Bottom of all content',
			'id' => 'widget-main',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
		) );

		register_sidebar( array(
			'name' => 'Bottom of post content',
			'id' => 'widget-main-post',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
		) );

		register_sidebar( array(
			'name' => 'Bottom of drawer',
			'id' => 'widget-drawer',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
		) );

	}
	add_action( 'widgets_init', 'mosi_widgets_init' );
}
