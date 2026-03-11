<?php
/**
 * sticky.php
 *
 * @package mosir
 */
?>
<?php
if( has_nav_menu('sticky_nav') ) {
	wp_nav_menu(
		array(
			'theme_location' => 'sticky_nav',
			'container'       => 'div',
			'container_class' => 'p-stickyMenu',
			'menu_id' => 'sticky-nav',
			'menu_class' => 'menu p-stickyMenu__nav c-nav',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'link_before'      => '<span class="menu-label c-nav__item__label">',
			'link_after'      => '</span>',
		)
	);
}
?>
