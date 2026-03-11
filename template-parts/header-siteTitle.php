<?php
/**
 * header-siteTitle.php
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
<?php if( is_front_page() && $args['mosi_options_header_markup'] === 'h1' ): ?>
  <h1 class="l-header__siteTitle p-siteTitle">
<?php elseif( is_front_page() ): ?>
  <p class="l-header__siteTitle p-siteTitle">
<?php else: ?>
  <p class="l-header__siteTitle p-siteTitle">
    <a href="<?php echo esc_url( home_url() ); ?>">
<?php endif; ?>

<?php if( $args['mosi_custom_logo_src_url'] && $args['mosi_custom_logo_width'] ): ?>
  <span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $args['mosi_custom_logo_src_url'] ) . '" alt="'. get_bloginfo('name') .'" width="' . $args['mosi_custom_logo_width'] . '" height="' . $args['mosi_custom_logo_height'] . '">'; ?></span>
<?php elseif( $args['mosi_custom_logo_src_url'] ): ?>
  <span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $args['mosi_custom_logo_src_url'] ) . '" alt="'. get_bloginfo('name') .'">'; ?></span>
<?php else: ?>
  <span class="p-siteTitle__label"><?php bloginfo('name'); ?></span>
<?php endif; ?>

<?php if( is_front_page() && $args['mosi_options_header_markup'] === 'h1' ): ?>
  </h1>
<?php elseif( is_front_page() ): ?>
  </p>
<?php else: ?>
    </a>
  </p>
<?php endif; ?>
