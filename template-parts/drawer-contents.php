<?php
/**
 * drawer-contents.php
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
if( has_nav_menu('drawer_nav_01') ) {
  wp_nav_menu(
    array(
      'theme_location'  => 'drawer_nav_01',
      'container'       => 'div',
      'container_class' => 'p-drawer__menu01 p-verticalMenu',
      'menu_id'         => 'drawer-nav-01',
      'menu_class'      => 'menu p-verticalMenu__nav c-nav',
      'link_before'     => '<span class="menu-label c-nav__item__label">',
      'link_after'      => '</span>',
    )
  );
}
?>
<?php
if( has_nav_menu('drawer_nav_02') ) {
  wp_nav_menu(
    array(
      'theme_location'  => 'drawer_nav_02',
      'container'       => 'div',
      'container_class' => 'p-drawer__menu02 p-sitemap p-sitemap--' . esc_attr( $args['mosi_options_drawer_size'] ),
      'menu_id'         => 'drawer-nav-02',
      'menu_class'      => 'menu p-sitemap__nav c-nav',
      'link_before'     => '<span class="menu-label c-nav__item__label">',
      'link_after'      => '</span>',
    )
  );
}
?>

<?php if ( is_active_sidebar( 'widget-drawer' ) ) : ?>
<div class="p-widgetArea p-widgetArea--drawer">
  <div class="p-widgetArea__inner">
    <?php dynamic_sidebar( 'widget-drawer' ); ?>
  </div>
</div>
<?php endif; ?>
