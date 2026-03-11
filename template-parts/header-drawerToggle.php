<?php
/**
 * header-drawerToggle.php
 *
 * @package mosir
 *
 * @param array $args {
 *  mosi_options_header_markup: string (not use),
 *  mosi_options_header_layout: string,
 *  mosi_options_drawer_displaying: string,
 *  mosi_custom_logo_src_url: string | bool (not use),
 *  mosi_custom_logo_width: int | bool (not use),
 *  mosi_custom_logo_height: int | bool (not use)
 * }
 *
 */
?>
<div class="l-header__drawerToggle p-drawerToggle p-drawerToggle--<?php echo esc_attr( $args['mosi_options_drawer_displaying'] ); ?>">
  <div class="p-drawerToggle__contents l-container">
    <button
      aria-label="<?php echo __( 'Open/close drawer menu', 'mosir' ); ?>"
      id="mosi-drawer-toggle"
      class="js-mosi-drawer p-drawerToggle__button c-toggleButton<?php echo $args['mosi_options_header_layout'] !== 'small' ? ' c-toggleButton--lg' : ''; ?>"
      data-mosi-drawer-action="toggle"
      data-mosi-drawer-duration="500"
      aria-controls="drawer"
      aria-expanded="false"
    >
      <span class="c-toggleButton__label">Menu</span>
      <span class="c-toggleButton__icon"></span>
    </button>
  </div>
</div>
