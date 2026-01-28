<?php
/**
 * mosir functions and definitions > customizer
 *
 * @package mosir
 */

if ( ! function_exists( 'mos_customize_register' ) ){
	function mos_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'mos_config', array(
			'title'     => '"mosir" theme settings',
			'priority'  => 191,
		));


        $wp_customize->add_setting('mos_options_header_markup', array(
			'default'           => 'h1',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control('mos_options_control_header_markup', array(
				'settings'    => 'mos_options_header_markup',
				'label'       => 'Header markup',
				'description' => 'HTML tag for the header title (logo) when the front page is displayed',
				'section'     => 'mos_config',
				'type'        => 'select',
				'choices'     => array(
					'h1'   => 'h1 element',
					'p' => 'p element',
				)
		));


        $wp_customize->add_setting('mos_options_header_layout', array(
			'default'           => 'large',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control('mos_options_control_header_layout', array(
				'settings'  => 'mos_options_header_layout',
				'label'     => 'Header layout',
				'section'   => 'mos_config',
				'type'      => 'select',
				'choices' => array(
					'simple' => 'simple (logo only)',
					'small' => 'small (navbar)',
					'medium' => 'medium (one rows)',
					'large' => 'large (two rows)',
				)
		));


		$wp_customize->add_setting('mos_options_drawer_displaying', array(
			'default'           => 'always',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('mos_options_control_drawer', array(
				'settings'  => 'mos_options_drawer_displaying',
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
			'sanitize_callback' => 'sanitize_text_field',
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
				'settings'    => 'mos_options_copyright',
				'label'       => 'Footer copyright',
				'description' => 'You can hide the ads under the copyright by entering a string. You can use simple HTML tags for the string.',
				'section'     => 'mos_config',
				'type'        => 'text',
		));
	}


    add_action( 'customize_register', 'mos_customize_register' );
}
