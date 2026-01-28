<?php
/**
 * mosir functions and definitions > widgets
 *
 * @package mosir
 */

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
