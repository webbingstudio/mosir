<?php
/**
 * mosir functions and definitions > customizer
 *
 * @package mosir
 */

/**
 * [WP]Mosi_Customize_Control
 *
 * Created a custom customizer item that doesn't have an input form to add separation between items.
 *
 * @access public
 * @see WP_Customize_Control
 */

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Mosi_Customize_Control' ) ) {
	class Mosi_Customize_Control extends WP_Customize_Control {
		public function render_content() {
			if ( isset( $this->label ) ) {
				echo '<span class="customize-control-title" style="margin-top:1rem;padding-top:1rem;border-top:1px solid currentColor;">' . $this->label . '</span>';
			}
		}
	}
}


if ( ! function_exists( 'mosi_customize_register' ) ){
	function mosi_customize_register( $wp_customize ) {

		$active_post_types = get_post_types(
			array(
				'public' => true
			),
			'objects',
			'and'
		);
		$active_post_types_choices = array(
			'none' => __( 'Not use', 'mosir' )
		);

		foreach( $active_post_types as $post_type ) {
			if( ( $post_type->name !== 'page' ) && ( $post_type->name !== 'attachment' ) ) {
				$active_post_types_choices[$post_type->name] = $post_type->label;
			}
		}


		$wp_customize->add_section( 'mosi_config_basic', array(
			'title'    => __( 'mosir: Basic settings', 'mosir' ),
			'priority' => 191,
		));

		$wp_customize->add_section( 'mosi_config_mv', array(
			'title'    => __( 'mosir: Main visual', 'mosir' ),
			'priority' => 192,
		));

		$wp_customize->add_section( 'mosi_config_home', array(
			'title'    => __( 'mosir: Front page', 'mosir' ),
			'priority' => 193,
		));


        $wp_customize->add_setting( 'mosi_options_header_markup', array(
			'default'           => 'h1',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control( 'mosi_options_control_header_markup', array(
			'settings'    => 'mosi_options_header_markup',
			'label'       => __( 'Header markup', 'mosir' ),
			'description' => __( 'HTML tag for the header title (logo) when the front page is displayed', 'mosir' ),
			'section'     => 'mosi_config_basic',
			'type'        => 'select',
			'choices'     => array(
				'h1' => __( 'h1 element', 'mosir' ),
				'p'  => __( 'p element', 'mosir' ),
			)
		));


        $wp_customize->add_setting( 'mosi_options_header_layout', array(
			'default'           => 'large',
			'sanitize_callback' => 'sanitize_text_field',
		));

        $wp_customize->add_control( 'mosi_options_control_header_layout', array(
				'settings' => 'mosi_options_header_layout',
				'label'    => __( 'Header layout', 'mosir' ),
				'section'  => 'mosi_config_basic',
				'type'     => 'select',
				'choices' => array(
					'simple' => __( 'simple (logo only)', 'mosir' ),
					'small'  => __( 'small (navbar)', 'mosir' ),
					'medium' => __( 'medium (one rows)', 'mosir' ),
					'large'  => __( 'large (two rows)', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_drawer_displaying', array(
			'default'           => 'always',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_drawer', array(
				'settings'  => 'mosi_options_drawer_displaying',
				'label'     => __( 'Drawer displaying', 'mosir' ),
				'section'   => 'mosi_config_basic',
				'type'      => 'select',
				'choices' => array(
					'always' => __( 'Always show', 'mosir' ),
					'mobile' => __( 'Mobile only', 'mosir' ),
					'none'   => __( 'None', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_drawer_size', array(
			'default'           => 'slim',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_drawer_size', array(
				'settings' => 'mosi_options_drawer_size',
				'label'    => __( 'Drawer size', 'mosir' ),
				'section'  => 'mosi_config_basic',
				'type'     => 'select',
				'choices' => array(
					'slim' => __( 'Slim', 'mosir' ),
					'wide' => __( 'Wide', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_copyright', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_copyright', array(
				'settings'    => 'mosi_options_copyright',
				'label'       => __( 'Footer copyright', 'mosir' ),
				'description' => __( 'You can hide the ads under the copyright by entering a text. You can use simple HTML tags for the string.', 'mosir' ),
				'section'     => 'mosi_config_basic',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_mv_visible', array(
			'default'           => 'show',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_visible', array(
				'settings'    => 'mosi_options_mv_visible',
				'label'       => __( 'Main visual displaying', 'mosir' ),
				'description' => __( 'The main visual of this theme is very simple. Also check out Cover Block and other great block-adding plugins!', 'mosir' ),
				'section'     => 'mosi_config_mv',
				'type'        => 'select',
				'choices' => array(
					'show' => __( 'Show', 'mosir' ),
					'hide' => __( 'Hide', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_mv_image_pc', array(
			'default'           => get_theme_file_uri( 'assets/images/home/mv_default_16to9.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mosi_options_control_mv_image_pc', array(
				'settings'    => 'mosi_options_mv_image_pc',
				'label'       => __( 'Image (Desktop, Tablet landscape)', 'mosir' ),
				'description' => __( 'Recommended size: Width 1920px or more / Height 1080px or more', 'mosir' ),
				'section'     => 'mosi_config_mv',
		)));


		$wp_customize->add_setting( 'mosi_options_mv_image_sp', array(
			'default'           => get_theme_file_uri( 'assets/images/home/mv_default_2to3.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mosi_options_control_mv_image_sp', array(
				'settings'    => 'mosi_options_mv_image_sp',
				'label'       => __( 'Image (Phone, Tablet portrait)', 'mosir' ),
				'description' => __( 'Recommended size: Width 1200px or more / Height 1800px or more', 'mosir' ),
				'section'     => 'mosi_config_mv',
		)));


		$wp_customize->add_setting( 'mosi_options_mv_filter', array(
			'default'           => 'none',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_filter', array(
				'settings'    => 'mosi_options_mv_filter',
				'label'       => __( 'Image filter', 'mosir' ),
				'section'     => 'mosi_config_mv',
				'type'        => 'select',
				'choices' => array(
					'none'       => __( 'No filter', 'mosir' ),
					'darken'     => __( 'Darken', 'mosir' ),
					'lighten'    => __( 'Lighten', 'mosir' ),
					'monochrome' => __( 'Monochrome', 'mosir' ),
					'duotone'    => __( 'Primary color duotone', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_mv_catch', array(
			'default'           => 'mosir',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_catch', array(
				'settings'    => 'mosi_options_mv_catch',
				'label'       => __( 'Catch phrase', 'mosir' ),
				'description' => __( 'You can use simple HTML tags for the string.', 'mosir' ),
				'section'     => 'mosi_config_mv',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_mv_text', array(
			'default'           => 'Hybrid WordPress Theme for Website Developers',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_mv_text', array(
				'settings'    => 'mosi_options_mv_text',
				'label'       => __( 'Subtext', 'mosir' ),
				'description' => __( 'You can use simple HTML tags for the string.', 'mosir' ),
				'section'     => 'mosi_config_mv',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_position', array(
			'default'           => 'after',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_position', array(
				'settings'    => 'mosi_options_home_posts_position',
				'label'       => __( 'Posts position', 'mosir' ),
				'description' => __( 'Choose where on the front page you want to display the two posts.', 'mosir' ),
				'section'     => 'mosi_config_home',
				'type'        => 'select',
				'choices' => array(
					'before' => __( 'Before content: 1, 2', 'mosir' ),
					'after'  => __( 'After content: 1, 2', 'mosir' ),
					'both'   => __( 'Both: Before 1 - After 2', 'mosir' ),
				)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_layout', array(
			'default'           => 'two',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_layout', array(
			'settings'    => 'mosi_options_home_posts_layout',
			'label'       => __( 'Layout of posts', 'mosir' ),
			'description' => __( 'Select the layout of posts when displayed on a wide screen. If you select "Both" for post position, "One column" will be forced.', 'mosir' ),
			'section'     => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'one' => __( 'One column', 'mosir' ),
				'two' => __( 'Two columns', 'mosir' ),
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_divider_01', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( new Mosi_Customize_Control( $wp_customize, 'mosi_options_home_posts_divider_01', array(
			'section' => 'mosi_config_home',
			'label' => __( 'Posts - section 1', 'mosir' ),
		)));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_type_01', array(
			'default'           => 'post',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_type_01', array(
			'settings' => 'mosi_options_home_posts_post_type_01',
			'label'    => __( '1: Post type', 'mosir' ),
			'section'  => 'mosi_config_home',
			'type'     => 'select',
			'choices'  => $active_post_types_choices
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_header_01', array(
			'default'           => 'top',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_header_01', array(
			'settings'    => 'mosi_options_home_posts_header_01',
			'label'       => __( '1: Display of header', 'mosir' ),
			'description' => __( 'If you select "Two column" for post layout, "Left when on desktop" will be ignore.', 'mosir' ),
			'section'     => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'none' => __( 'None', 'mosir' ),
				'top'  => __( 'Always top', 'mosir' ),
				'left' => __( 'Left when on desktop', 'mosir' ),
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_title_01', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_title_01', array(
				'settings'    => 'mosi_options_home_posts_title_01',
				'label'       => '1: Title of header',
				'description' => 'You can change the header title (e.g. Press release). If not set it will be the post type label, or "Latest Posts" as post.',
				'section'     => 'mosi_config_home',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_subtitle_01', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_subtitle_01', array(
				'settings'    => 'mosi_options_home_posts_subtitle_01',
				'label'       => '1: Subtitle of header',
				'description' => 'You can change the header sub title (e.g. News). If not set it will be the post type slug, or "Blog" as post.',
				'section'     => 'mosi_config_home',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_limit_01', array(
			'default'           => '6',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_limit_01', array(
			'settings' => 'mosi_options_home_posts_post_limit_01',
			'label'    => '1: Limit of posts',
			'section'  => 'mosi_config_home',
			'type'     => 'number',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_order_01', array(
			'default'           => 'DESC',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_order_01', array(
			'settings' => 'mosi_options_home_posts_post_order_01',
			'label'    => '1: Order of posts',
			'section'  => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'DESC' => 'Descending',
				'ASC' => 'Ascending',
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_loop_01', array(
			'default'           => 'card',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_loop_01', array(
			'settings' => 'mosi_options_home_posts_post_loop_01',
			'label'    => '1: Loop design of posts',
			'section'  => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'headline' => 'Headline',
				'headline-no-meta' => 'Headline (no meta)',
				'card' => 'Card',
				'card-no-meta' => 'Card (no meta)',
				'media' => 'Media',
				'media-no-meta' => 'Media (no meta)',
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_link_01', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_link_01', array(
				'settings'    => 'mosi_options_home_posts_link_01',
				'label'       => '1: Link path to index page',
				'description' => '',
				'section'     => 'mosi_config_home',
				'type'        => 'url',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_divider_02', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( new Mosi_Customize_Control( $wp_customize, 'mosi_options_home_posts_divider_02', array(
			'section' => 'mosi_config_home',
			'label' => __( 'Posts - section 2', 'mosir' )
		)));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_type_02', array(
			'default'           => 'none',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_type_02', array(
			'settings' => 'mosi_options_home_posts_post_type_02',
			'label'    => __( '2: Post type', 'mosir' ),
			'section'  => 'mosi_config_home',
			'type'     => 'select',
			'choices'  => $active_post_types_choices
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_header_02', array(
			'default'           => 'top',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_header_02', array(
			'settings'    => 'mosi_options_home_posts_header_02',
			'label'       => __( '2: Display of header', 'mosir' ),
			'description' => __( 'If you select "Two column" for post layout, "Left when on desktop" will be ignore.', 'mosir' ),
			'section'     => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'none' => __( 'None', 'mosir' ),
				'top'  => __( 'Always top', 'mosir' ),
				'left' => __( 'Left when on desktop', 'mosir' ),
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_title_02', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_title_02', array(
				'settings'    => 'mosi_options_home_posts_title_02',
				'label'       => '2: Title of header',
				'description' => 'You can change the header title (e.g. Latest Posts). If not set it will be the post type label.',
				'section'     => 'mosi_config_home',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_subtitle_02', array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_post_kses',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_subtitle_02', array(
				'settings'    => 'mosi_options_home_posts_subtitle_02',
				'label'       => '2: Subtitle of header',
				'description' => 'You can change the header sub title (e.g. News). If not set it will be the post type slug.',
				'section'     => 'mosi_config_home',
				'type'        => 'text',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_limit_02', array(
			'default'           => '6',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_limit_02', array(
			'settings' => 'mosi_options_home_posts_post_limit_02',
			'label'    => '2: Limit of posts',
			'section'  => 'mosi_config_home',
			'type'     => 'number',
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_order_02', array(
			'default'           => 'DESC',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_order_02', array(
			'settings' => 'mosi_options_home_posts_post_order_02',
			'label'    => '2: Order of posts',
			'section'  => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'DESC' => 'Descending',
				'ASC' => 'Ascending',
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_post_loop_02', array(
			'default'           => 'card',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_post_loop_02', array(
			'settings' => 'mosi_options_home_posts_post_loop_02',
			'label'    => '2: Loop design of posts',
			'section'  => 'mosi_config_home',
			'type'        => 'select',
			'choices' => array(
				'headline' => 'Headline',
				'headline-no-meta' => 'Headline (no meta)',
				'card' => 'Card',
				'card-no-meta' => 'Card (no meta)',
				'media' => 'Media',
				'media-no-meta' => 'Media (no meta)',
			)
		));


		$wp_customize->add_setting( 'mosi_options_home_posts_link_02', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( 'mosi_options_control_home_posts_link_02', array(
				'settings'    => 'mosi_options_home_posts_link_02',
				'label'       => '2: Link path to index page',
				'description' => '',
				'section'     => 'mosi_config_home',
				'type'        => 'url',
		));


	}

    add_action( 'customize_register', 'mosi_customize_register' );
}
