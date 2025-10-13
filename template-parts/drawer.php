<?php
/**
 * drawer.php
 * ドロワーメニュー用テンプレート
 *
 * @package ws-minimalism
 */
?>
<div class="p-drawerToggle">
	<button id="drawer-toggle" class="p-drawerToggle__button c-toggleButton" aria-controls="drawer" aria-expanded="false">
		<span class="c-toggleButton__label">Menu</span>
		<span class="c-toggleButton__icon"></span>
	</button>
</div>
<div id="drawer" class="p-drawer" aria-hidden="true">
	<div class="p-drawer__contents">
		<div class="p-drawer__contents__inner l-container l-container--sm">
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
						'container_class' => 'p-drawer__menu02 p-sitemap',
						'menu_id' => 'drawer-nav-02',
						'menu_class' => 'menu p-sitemap__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
		</div>
	</div>
</div>
