<?php
/**
 * drawer.php
 * ドロワーメニュー用テンプレート
 *
 * @package mosir
 */

$mosi_options_header_layout = get_theme_mod( 'mosi_options_header_layout', 'large' );
$mosi_options_drawer_displaying = get_theme_mod( 'mosi_options_drawer_displaying', 'always' );
$mosi_options_drawer_size = get_theme_mod( 'mosi_options_drawer_size', 'slim' );
?>
<div aria-label="Drawer menu" id="drawer" class="p-drawer p-drawer--<?php echo esc_attr($mosi_options_drawer_displaying); ?> p-drawer--size-<?php echo esc_attr($mosi_options_drawer_size); ?>" aria-hidden="true">
	<div class="p-drawer__close">
		<div class="p-drawer__close__contents l-container">
			<button aria-label="Open/close this menu" id="mosi-drawer-close-top" class="js-mosi-drawer p-drawer__close__button c-toggleButton<?php echo $mosi_options_header_layout !== 'small' ? ' c-toggleButton--lg' : ''; ?>" data-mosi-drawer-action="toggle" data-mosi-drawer-duration="500" aria-controls="drawer" aria-expanded="false">
				<span class="c-toggleButton__label">Menu</span>
				<span class="c-toggleButton__icon"></span>
			</button>
		</div>
	</div>
	<div class="p-drawer__contents">
		<div class="p-drawer__contents__inner l-container">

			<?php
			if( has_nav_menu('drawer_nav_01') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'drawer_nav_01',
						'container'       => 'div',
						'container_class' => 'p-drawer__menu01 p-verticalMenu',
						'menu_id' => 'drawer-nav-01',
						'menu_class' => 'menu p-verticalMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
			<?php
			if( has_nav_menu('drawer_nav_02') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'drawer_nav_02',
						'container'       => 'div',
						'container_class' => 'p-drawer__menu02 p-sitemap p-sitemap--' . esc_attr($mosi_options_drawer_size),
						'menu_id' => 'drawer-nav-02',
						'menu_class' => 'menu p-sitemap__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

			<?php if ( is_active_sidebar( 'widget-drawer' ) ) : ?>
			<div class="u-p--t-xl p-widgetArea p-widgetArea--drawer">
				<div class="p-widgetArea__inner">
					<?php dynamic_sidebar( 'widget-drawer' ); ?>
				</div>
			</div>
			<?php endif; ?>

			<div class="p-drawer__footer">
				<button aria-label="Close this menu" id="mosi-drawer-close-bottom" class="js-mosi-drawer p-drawer__footer__button c-button" data-mosi-drawer-action="close" data-mosi-drawer-duration="500" aria-controls="drawer">
					✕ Close menu
				</button>
			</div>
		</div>
	</div>
</div>
