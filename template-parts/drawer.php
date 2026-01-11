<?php
/**
 * drawer.php
 * ドロワーメニュー用テンプレート
 *
 * @package mosir
 */

$mo_options_drawer = get_theme_mod( 'mo_options_drawer', 'always' );
$mo_options_drawer_size = get_theme_mod( 'mo_options_drawer_size', 'slim' );
?>
<?php if( $mo_options_drawer !== 'none' ): ?>
<div class="p-drawerToggle p-drawerToggle--<?php echo esc_attr($mo_options_drawer); ?>">
	<div class="p-drawerToggle__contents l-container">
		<button id="mo-drawer-toggle" class="p-drawerToggle__button c-toggleButton" aria-controls="drawer" aria-expanded="false">
			<span class="c-toggleButton__label">Menu</span>
			<span class="c-toggleButton__icon"></span>
		</button>
	</div>
</div>
<div id="drawer" class="p-drawer p-drawer--<?php echo esc_attr($mo_options_drawer); ?> p-drawer--size-<?php echo esc_attr($mo_options_drawer_size); ?>" aria-hidden="true">
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
						'container_class' => 'p-drawer__menu02 p-sitemap p-sitemap--' . esc_attr($mo_options_drawer_size),
						'menu_id' => 'drawer-nav-02',
						'menu_class' => 'menu p-sitemap__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
			<div class="p-drawer__footer">
				<button id="mo-drawer-close" class="p-drawer__footer__button c-button" aria-controls="drawer">
					✕ メニューを閉じる
				</button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
