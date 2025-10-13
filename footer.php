<?php
/**
 * footer.php
 * 共通フッタ用テンプレート
 *
 * @package ws-minimalism
 */
?>
</main>

<footer class="l-footer">
	<div class="l-footer__contents l-container">
		<?php
		if( has_nav_menu('footer_nav_01') ) {
			wp_nav_menu(
				array(
					'theme_location' => 'footer_nav_01',
					'container'       => 'nav',
					'container_aria_label'       => 'Footer navigation',
					'container_class' => 'l-footer__contents__menu01 p-horizontalMenu',
					'menu_id' => 'footer-nav-01',
					'menu_class' => 'menu p-horizontalMenu__nav c-nav',
					'link_before'      => '<span class="menu-label c-nav__item__label">',
					'link_after'      => '</span>',
				)
			);
		}
		?>
		<?php
		if( has_nav_menu('footer_nav_02') ) {
			wp_nav_menu(
				array(
					'theme_location' => 'footer_nav_02',
					'container'       => 'nav',
					'container_aria_label'       => 'Footer sitemap',
					'container_class' => 'l-footer__contents__menu02 p-sitemap',
					'menu_id' => 'footer-nav-02',
					'menu_class' => 'menu p-sitemap__nav c-nav',
					'link_before'      => '<span class="menu-label c-nav__item__label">',
					'link_after'      => '</span>',
				)
			);
		}
		?>
	</div>
	<div class="l-footer__copyright">
		<p class="l-footer__copyright__body">&copy; <?php bloginfo('name'); ?></p>
	</div>
</footer>
<?php
if( has_nav_menu('sticky_nav') ) {
	wp_nav_menu(
		array(
			'theme_location' => 'sticky_nav',
			'container'       => 'div',
			'container_class' => 'p-stickyMenu',
			'menu_id' => 'sticky-nav',
			'menu_class' => 'menu p-stickyMenu__nav c-nav',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'link_before'      => '<span class="menu-label c-nav__item__label">',
			'link_after'      => '</span>',
		)
	);
}
?>
<?php wp_footer(); ?>
</body>
</html>
