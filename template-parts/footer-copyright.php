<?php
/**
 * footer-copyright.php
 *
 * @package mosir
 *
 * @param array $args {
 *  mosi_options_header_layout: string (not use),
 *  mosi_options_drawer_displaying: string (not use),
 *  mosi_options_drawer_size: string (not use),
 *  mosi_options_copyright: string | bool
 * }
 *
 */
?>
<div class="l-footer__copyright">
  <p class="l-footer__copyright__body">
    <?php if( $args['mosi_options_copyright'] ): ?>
      <?php echo wp_unslash( wp_filter_post_kses( $args['mosi_options_copyright'] ) ); ?>
    <?php else: ?>
      &copy; <?php bloginfo('name'); ?>
    <?php endif; ?>
  </p>
  <?php if( !$args['mosi_options_copyright'] ): ?>
  <p class="l-footer__copyright__body u-p--t-sm has-small-font-size"><a href="https://mosir.webbingstudio.com/" target="_blank" rel="noopener noreferrer"><strong><?php echo __( 'WordPress theme &quot;mosir&quot;', 'mosir' ); ?></strong></a></p>
  <?php endif; ?>
</div>
