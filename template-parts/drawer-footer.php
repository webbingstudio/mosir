<?php
/**
 * drawer-footer.php
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
<div class="p-drawer__footer p-buttons">
  <button
    id="mosi-drawer-close-bottom"
    class="js-mosi-drawer p-drawer__footer__button c-button"
    aria-label="<?php echo __( 'Close this menu', 'mosir' ); ?>"
    aria-controls="drawer"
    data-mosi-drawer-action="close"
    data-mosi-drawer-duration="500"
  >
    ✕ <?php echo __( 'Close menu', 'mosir' ); ?>
  </button>
</div>
