<?php
/**
 * header-top.php
 *
 * @package mosir
 *
 * @param array $args {
 *  mosi_options_header_markup: string,
 *  mosi_options_header_layout: string (not use),
 *  mosi_options_drawer_displaying: string (not use),
 *  mosi_custom_logo_src_url: string | bool,
 *  mosi_custom_logo_width: int | bool,
 *  mosi_custom_logo_height: int | bool
 * }
 *
 */
?>
<div class="l-header__top">

  <?php
  if( has_nav_menu('header_nav_01') && $args['mosi_options_header_layout'] !== 'large' ) {
    wp_nav_menu(
      array(
        'theme_location' => 'header_nav_01',
        'container'       => 'nav',
        'container_aria_label'       => 'Global navigation',
        'container_class' => 'l-header__menu01 p-megaMenu',
        'menu_id' => 'header-nav-01',
        'menu_class' => 'menu p-megaMenu__nav c-nav',
        'link_before'      => '<span class="menu-label c-nav__item__label">',
        'link_after'      => '</span>',
      )
    );
  }
  ?>

  <?php
  if( has_nav_menu('header_nav_02') && $args['mosi_options_header_layout'] === 'large' ) {
    wp_nav_menu(
      array(
        'theme_location' => 'header_nav_02',
        'container'       => 'div',
        'container_class' => 'l-header__menu02 p-horizontalMenu p-horizontalMenu--arrowed',
        'menu_id' => 'header-nav-02',
        'menu_class' => 'menu p-horizontalMenu__nav c-nav',
        'link_before'      => '<span class="menu-label c-nav__item__label">',
        'link_after'      => '</span>',
      )
    );
  }
  ?>

  <?php
  if( has_nav_menu('header_nav_03') ) {
    wp_nav_menu(
      array(
        'theme_location' => 'header_nav_03',
        'container'       => 'div',
        'container_class' => 'l-header__menu03 p-horizontalMenu',
        'menu_id' => 'header-nav-03',
        'menu_class' => 'menu p-horizontalMenu__nav c-nav',
        'link_before'      => '<span class="menu-label c-nav__item__label">',
        'link_after'      => '</span>',
      )
    );
  }
  ?>
</div>
