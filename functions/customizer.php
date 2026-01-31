<?php
/**
 * mosir functions and definitions > customizer
 *
 * @package mosir
 */

if ( ! function_exists( 'mosi_customize_register' ) ){
	function mosi_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'mosi_config_basic', array(
			'title'    => 'mosir: basic settings',
			'priority' => 191,
		));

		$wp_customize->add_section( 'mosi_config_mv', array(
			'title'    => 'mosir: main visual settings',
			'priority' => 192,
		));


        $wp_customize->add_setting( 'mosi_options_header_markup', array(
			'default'           => 'h1',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control( 'mosi_options_control_header_markup', array(
			'settings'    => 'mosi_options_header_markup',
			'label'       => 'Header markup',
			'description' => 'HTML tag for the header title (logo) when the front page is displayed',
			'section'     => 'mosi_config_basic',
			'type'        => 'select',
			'choices'     => array(
				'h1' => 'h1 element',
				'p'  => 'p element',
			)
		));


        $wp_customize->add_setting( 'mosi_options_header_layout', array(
			'default'           => 'large',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control( 'mosi_options_control_header_layout', array(
				'settings' => 'mosi_options_header_layout',
				'label'    => 'Header layout',
				'section'  => 'mosi_config_basic',
				'type'     => 'select',
				'choices' => array(
					'simple' => 'simple (logo only)',
					'small'  => 'small (navbar)',
					'medium' => 'medium (one rows)',
					'large'  => 'large (two rows)',
				)
		));


		$wp_customize->add_setting( 'mosi_options_drawer_displaying', array(
			'default'           => 'always',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_drawer', array(
				'settings'  => 'mosi_options_drawer_displaying',
				'label'     => 'Drawer displaying',
				'section'   => 'mosi_config_basic',
				'type'      => 'select',
				'choices' => array(
					'always' => 'Always show',
					'mobile' => 'Mobile only',
					'none'   => 'None',
				)
		));


		$wp_customize->add_setting( 'mosi_options_drawer_size', array(
			'default'           => 'slim',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_drawer_size', array(
				'settings' => 'mosi_options_drawer_size',
				'label'    => 'Drawer displaying',
				'section'  => 'mosi_config_basic',
				'type'     => 'select',
				'choices' => array(
					'slim' => 'Slim',
					'wide' => 'Wide',
				)
		));


		$wp_customize->add_setting( 'mosi_options_copyright', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_copyright', array(
				'settings'    => 'mosi_options_copyright',
				'label'       => 'Footer copyright',
				'description' => 'You can hide the ads under the copyright by entering a string. You can use simple HTML tags for the string.',
				'section'     => 'mosi_config_basic',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_mv_visible', array(
			'default'           => 'show',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_visible', array(
				'settings'    => 'mosi_options_mv_visible',
				'label'       => 'Main visual displaying',
				'description' => 'The main visual of this theme is very simple. Also check out Cover Block and other great block-adding plugins!',
				'section'     => 'mosi_config_mv',
				'type'        => 'select',
				'choices' => array(
					'show' => 'Show',
					'hide' => 'Hide',
				)
		));


		$wp_customize->add_setting( 'mosi_options_mv_image_pc', array(
			'default'           => get_theme_file_uri( 'assets/images/home/mv_default_16to9.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mosi_options_control_mv_image_pc', array(
				'settings'    => 'mosi_options_mv_image_pc',
				'label'       => 'Image (Desktop, Tablet landscape)',
				'description' => 'Recommended size: Width 1920px or more / Height 1080px or more',
				'section'     => 'mosi_config_mv',
		)));


		$wp_customize->add_setting( 'mosi_options_mv_image_sp', array(
			'default'           => get_theme_file_uri( 'assets/images/home/mv_default_2to3.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mosi_options_control_mv_image_sp', array(
				'settings'    => 'mosi_options_mv_image_sp',
				'label'       => 'Image (Phone, Tablet portrait)',
				'description' => 'Recommended size: Width 1200px or more / Height 1800px or more',
				'section'     => 'mosi_config_mv',
		)));


		$wp_customize->add_setting( 'mosi_options_mv_filter', array(
			'default'           => 'none',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_filter', array(
				'settings'    => 'mosi_options_mv_filter',
				'label'       => 'Image filter',
				'section'     => 'mosi_config_mv',
				'type'        => 'select',
				'choices' => array(
					'none'       => 'None',
					'darken'     => 'Darken',
					'lighten'    => 'Lighten',
					'monochrome' => 'Monochrome',
					'duotone'    => 'Accent Color Duotone',
				)
		));


		$wp_customize->add_setting( 'mosi_options_mv_catch', array(
			'default'           => 'mosir',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_catch', array(
				'settings'    => 'mosi_options_mv_catch',
				'label'       => 'Catch phrase',
				'description' => 'You can use simple HTML tags for the string.',
				'section'     => 'mosi_config_mv',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_mv_text', array(
			'default'           => 'Hybrid WordPress Theme for Website Developers',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_text', array(
				'settings'    => 'mosi_options_mv_text',
				'label'       => 'Sub text',
				'description' => 'You can use simple HTML tags for the string.',
				'section'     => 'mosi_config_mv',
				'type'        => 'text',
		));

	}

    add_action( 'customize_register', 'mosi_customize_register' );
}
