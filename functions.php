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

if ( ! function_exists( 'mos_setup' ) ) :
	function mos_setup() {
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
add_action( 'after_setup_theme', 'mos_setup' );


// ==============================
// Enqueues Styles and Scripts
// ==============================

if ( ! function_exists( 'mos_enqueue_styles' ) ) :
	/**
	 * Enqueues theme.css on the front.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mos_enqueue_styles() {
		wp_enqueue_style(
			'theme-style',
			get_theme_file_uri( 'assets/css/theme.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'mos_enqueue_styles' );


if ( ! function_exists( 'mos_enqueue_scripts' ) ) :
	/**
	 * Enqueues theme.css on the front.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mos_enqueue_scripts() {
		wp_enqueue_script(
			'theme-script',
			get_theme_file_uri( 'assets/js/theme.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			array( 'strategy'  => 'defer' )
			);
		}
	endif;
add_action( 'wp_enqueue_scripts', 'mos_enqueue_scripts' );


if ( ! function_exists( 'mos_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mos_editor_style() {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'mos_editor_style' );


if ( ! function_exists( 'mos_enqueue_block_editor_assets' ) ) :
	/**
	 * Enqueues editor-script.js in the editors.
	 *
	 * @since mosir 1.0
	 *
	 * @return void
	 */
	function mos_enqueue_block_editor_assets() {
		wp_enqueue_script(
			'editor-script',
			get_theme_file_uri( 'assets/js/editor-script.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'mos_enqueue_block_editor_assets' );


// ==============================
// Menus
// ==============================

if ( ! function_exists( 'mos_redistar_nav_menu' ) ) :
	/**
	 * Define the menus to use within the theme
	 *
	 * @since mosir 1.0
	 *
	 * @return string
	 */
	function mos_redistar_nav_menu() {
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
add_action( 'after_setup_theme', 'mos_redistar_nav_menu' );


// ==============================
// Compatible WordPress BlockEditor(Gutenberg)
// ==============================

if ( ! function_exists( 'mos_wp_block_class' ) ) :
	/**
	 * Echo WordPress BlockEditor class name
	 *
	 * @since mosir 1.0
	 *
	 * @param string $before The string to prepend, such as a space.
	 * @param string $after The string to append, such as a space.
	 * @return string
	 */
	function mos_wp_block_class( $before = '', $after = '' ) {
		echo esc_attr( $before ) . 'wp-block-post-content is-layout-constrained has-global-padding' . esc_attr( $after );
	}
endif;


// ==============================
// Theme customizer
// ==============================

if ( ! function_exists( 'mos_sanitize_checkbox' ) ){
	function mos_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}

if ( ! function_exists( 'mos_sanitize_select' ) ){
	function mos_sanitize_select( $input, $setting ) {
		$input = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'mos_customize_register' ) ){
	function mos_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'mos_config', array(
			'title'     => '"mosir" theme settings',
			'priority'  => 191,
		));

		$wp_customize->add_setting('mos_options_header', array(
			'default'           => 'large',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control('mos_options_control_header', array(
				'settings'  => 'mos_options_header',
				'label'     => 'Header layout',
				'section'   => 'mos_config',
				'type'      => 'select',
				'choices' => array(
					'small' => 'small (minimal)',
					'medium' => 'medium (one rows)',
					'large' => 'large (two rows)',
				)
		));

		$wp_customize->add_setting('mos_options_drawer', array(
			'default'           => 'always',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control('mos_options_control_drawer', array(
				'settings'  => 'mos_options_drawer',
				'label'     => 'Drawer displaying',
				'section'   => 'mos_config',
				'type'      => 'select',
				'choices' => array(
					'always' => 'Always show',
					'mobile' => 'Mobile only',
					'none' => 'None',
				)
		));

		$wp_customize->add_setting('mos_options_drawer_size', array(
			'default'           => 'slim',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control('mos_options_control_drawer_size', array(
				'settings'  => 'mos_options_drawer_size',
				'label'     => 'Drawer displaying',
				'section'   => 'mos_config',
				'type'      => 'select',
				'choices' => array(
					'slim' => 'Slim',
					'wide' => 'Wide',
				)
		));

		$wp_customize->add_setting('mos_options_copyright', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control('mos_options_control_copyright', array(
				'settings'  => 'mos_options_copyright',
				'label'     => 'Footer copyright',
				'section'   => 'mos_config',
				'type'      => 'text',
		));
	}
	add_action( 'customize_register', 'mos_customize_register' );
}

if ( !function_exists( 'mos_widgets_init' ) ) {
	function mos_widgets_init() {
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
	add_action( 'widgets_init', 'mos_widgets_init' );
}
