<?php
/**
 * drawer.php
 * ドロワーメニュー用テンプレート
 *
 * @package mosir
 */

$mi_options_drawer = get_theme_mod( 'mi_options_drawer', 'always' );
$mi_options_drawer_size = get_theme_mod( 'mi_options_drawer_size', 'slim' );
?>
<?php if( $mi_options_drawer !== 'none' ): ?>
<div class="mi-p-drawerToggle mi-p-drawerToggle--<?php echo esc_attr($mi_options_drawer); ?>">
	<div class="mi-p-drawerToggle__contents mi-l-container">
		<button id="mo-drawer-toggle" class="mi-p-drawerToggle__button mi-c-toggleButton" aria-controls="drawer" aria-expanded="false">
			<span class="mi-c-toggleButton__label">Menu</span>
			<span class="mi-c-toggleButton__icon"></span>
		</button>
	</div>
</div>
<div id="drawer" class="mi-p-drawer mi-p-drawer--<?php echo esc_attr($mi_options_drawer); ?> mi-p-drawer--size-<?php echo esc_attr($mi_options_drawer_size); ?>" aria-hidden="true">
	<div class="mi-p-drawer__contents">
		<div class="mi-p-drawer__contents__inner mi-l-container">
			<?php
			if( has_nav_menu('drawer_nav_01') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'drawer_nav_01',
						'container'       => 'div',
						'container_class' => 'mi-p-drawer__menu01 mi-p-verticalMenu',
						'menu_id' => 'drawer-nav-01',
						'menu_class' => 'menu mi-p-verticalMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
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
						'container_class' => 'mi-p-drawer__menu02 mi-p-sitemap mi-p-sitemap--' . esc_attr($mi_options_drawer_size),
						'menu_id' => 'drawer-nav-02',
						'menu_class' => 'menu mi-p-sitemap__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
			<div class="mi-p-drawer__footer">
				<button id="mo-drawer-close" class="mi-p-drawer__footer__button mi-c-button" aria-controls="drawer">
					✕ メニューを閉じる
				</button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
