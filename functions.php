<?php
/**
 * functions and definitions
 *
 * @package mosir
 */

if ( ! function_exists( 'mosi_setup' ) ) :
	/**
	 * Set up theme.
	 *
	 * @since mosir 1.0.0
	 *
	 * @return void
	 */
	function mosi_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo' );
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
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'wp-block-styles' );

		add_image_size( 'mosir-loop', 768, 432 );
	}
endif;
add_action( 'after_setup_theme', 'mosi_setup' );


if ( ! function_exists( 'mosi_enqueue_styles' ) ) :
	/**
	 * Enqueues theme.css on the front.
	 *
	 * @since mosir 1.0.0
	 *
	 * @return void
	 */
	function mosi_enqueue_styles() {
		wp_enqueue_style(
			'mosir-theme-style',
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
	 * @since mosir 1.0.0
	 *
	 * @return void
	 */
	function mosi_enqueue_scripts() {
		wp_enqueue_script(
			'mosir-theme-script',
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
	 * @since mosir 1.0.0
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
	 * @since mosir 1.0.0
	 *
	 * @return void
	 */
	function mosi_enqueue_block_editor_assets() {
		wp_enqueue_script(
			'mosir-editor-script',
			get_theme_file_uri( 'assets/js/editor-script.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'mosi_enqueue_block_editor_assets' );


if ( ! function_exists( 'mosi_redistar_nav_menu' ) ) :
	/**
	 * Define the menus to use within the theme
	 *
	 * @since mosir 1.0.0
	 *
	 * @return void
	 */
	function mosi_redistar_nav_menu() {
		register_nav_menus([
			'header_nav_01' => __( 'Header: Mega nav.', 'mosir' ),
			'header_nav_02' => __( 'Header: Horizontal nav.', 'mosir' ),
			'header_nav_03' => __( 'Header: Piped nav.', 'mosir' ),
			'header_nav_04' => __( 'Header: Buttons', 'mosir' ),
			'footer_nav_01' => __( 'Footer: Sitemap', 'mosir' ),
			'footer_nav_02' => __( 'Footer: Horizontal nav.', 'mosir' ),
			'drawer_nav_01' => __( 'Drawer: Vertical nav.', 'mosir' ),
			'drawer_nav_02' => __( 'Drawer: Sitemap', 'mosir' ),
			'sticky_nav'    => __( 'Sticky nav.', 'mosir' ),
		]);
	}
endif;
add_action( 'after_setup_theme', 'mosi_redistar_nav_menu' );


if ( ! function_exists( 'mosi_wp_block_class' ) ) :
	/**
	 * Add WordPress BlockEditor class name
	 *
	 * @since mosir 1.0.0
	 *
	 * @param string $before The string to prepend, such as a space.
	 * @param string $after The string to append, such as a space.
	 * @return string
	 */
	function mosi_wp_block_class( $before = '', $after = '' ) {
		echo esc_attr( $before ) . 'wp-block-post-content is-layout-constrained has-global-padding' . esc_attr( $after );
	}
endif;



if ( ! function_exists( 'mosi_enqueue_comments_reply' ) ) :
	/**
	 * Add .js script if "Enable threaded comments" is activated in Admin
	 *
	 * @since mosir 1.1.0
	 *
	 * @return void
	 */
	function mosi_enqueue_comments_reply() {

		if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'mosir-comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
		}
	}
	add_action( 'wp_enqueue_scripts', 'mosi_enqueue_comments_reply' );
endif;



require_once __DIR__ . '/functions/customizer.php';
require_once __DIR__ . '/functions/widgets.php';
