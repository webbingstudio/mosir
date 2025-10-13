<?php
/**
 * header_title.php
 *
 * @package ws-minimalism
 */

$mi_custom_logo_id = get_theme_mod( 'custom_logo' );
$mi_custom_logo_src = wp_get_attachment_image_src( $mi_custom_logo_id, 'full' );
$mi_custom_logo_width = $mi_custom_logo_src[1];
?>
<?php if( is_front_page() ): ?>
<h1 class="l-header__contents__siteTitle p-siteTitle">
<?php else: ?>
<p class="l-header__contents__siteTitle p-siteTitle">
  <a href="<?php bloginfo('url'); ?>">
<?php endif; ?>

    <?php if( $mi_custom_logo_src && $mi_custom_logo_width === 1 ): ?>
    <span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mi_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'">'; ?></span>
    <?php elseif( $mi_custom_logo_src ): ?>
    <span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mi_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'" width="' . $mi_custom_logo_src[1] . '" height="' . $mi_custom_logo_src[2] . '">'; ?></span>
    <?php else: ?>
    <span class="p-siteTitle__label"><?php bloginfo('name'); ?></span>
    <?php endif; ?>

<?php if( is_front_page() ): ?>
</h1>
<?php else: ?>
  </a>
</p>
<?php endif; ?>
