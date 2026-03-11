<?php
/**
 * footer-contents.php
 *
 * @package mosir
 *
 * @param array $args {
 *  mosi_options_header_layout: string (not use),
 *  mosi_options_drawer_displaying: string (not use),
 *  mosi_options_drawer_size: string (not use),
 *  mosi_options_copyright: string | bool (not use)
 * }
 *
 */
?>
<?php
if( has_nav_menu('footer_nav_01') ) {
  wp_nav_menu(
    array(
      'theme_location' => 'footer_nav_01',
      'container'       => 'nav',
      'container_aria_label'       => 'Footer sitemap',
      'container_class' => 'l-footer__menu01 p-sitemap',
      'menu_id' => 'footer-nav-01',
      'menu_class' => 'menu p-sitemap__nav c-nav',
      'link_before'      => '<span class="menu-label c-nav__item__label">',
      'link_after'      => '</span>',
    )
  );
}
?>
<?php
if( has_nav_menu('footer_nav_02') ) {
  wp_nav_menu(
    array(
      'theme_location' => 'footer_nav_02',
      'container'       => 'nav',
      'container_aria_label'       => 'Footer navigation',
      'container_class' => 'l-footer__menu02 p-horizontalMenu',
      'menu_id' => 'footer-nav-02',
      'menu_class' => 'menu p-horizontalMenu__nav c-nav',
      'link_before'      => '<span class="menu-label c-nav__item__label">',
      'link_after'      => '</span>',
    )
  );
}
?>
