<?php
/**
 * footer.php
 *
 * @package mosir
 */

$mos_options_drawer_displaying = get_theme_mod( 'mos_options_drawer_displaying', 'always' );
$mos_options_copyright = get_theme_mod( 'mos_options_copyright', (bool)false );
?>

<?php if ( is_active_sidebar( 'widget-main' ) ) : ?>
<div class="u-p--t-xl u-p--b-xl p-widgetArea p-widgetArea--main">
	<div class="p-widgetArea__inner">
		<?php dynamic_sidebar( 'widget-main' ); ?>
	</div>
</div>
<?php endif; ?>

</main>

<footer class="l-footer">
	<div class="l-footer__contents l-container">
		<?php
		if( has_nav_menu('footer_nav_01') ) {
			wp_nav_menu(
				array(
					'theme_location' => 'footer_nav_01',
					'container'       => 'nav',
					'container_aria_label'       => 'Footer sitemap',
					'container_class' => 'l-footer__menu01 p-sitemap p-sitemap--wide',
					'menu_id' => 'footer-nav-01',
					'menu_class' => 'menu p-sitemap__nav c-nav',
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
					'container_aria_label'       => 'Footer navigation',
					'container_class' => 'l-footer__menu02 p-horizontalMenu',
					'menu_id' => 'footer-nav-02',
					'menu_class' => 'menu p-horizontalMenu__nav c-nav',
					'link_before'      => '<span class="menu-label c-nav__item__label">',
					'link_after'      => '</span>',
				)
			);
		}
		?>
	</div>
	<div class="l-footer__copyright">
		<p class="l-footer__copyright__body">
			<?php if( $mos_options_copyright ): ?>
				<?php echo wp_unslash(wp_filter_post_kses($mos_options_copyright)); ?>
			<?php else: ?>
				&copy; <?php bloginfo('name'); ?>
			<?php endif; ?>
		</p>
		<?php if( !$mos_options_copyright ): ?>
		<p class="l-footer__copyright__body u-p--t-sm has-small-font-size"><a href="https://mosir.webbingstudio.com" target="_blank" rel="noopener noreferrer">WordPressテーマ &quot;mosir&quot;</a></p>
		<?php endif; ?>
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

</div>
<?php if( $mos_options_drawer_displaying !== 'none' ): ?>
<?php get_template_part( 'template-parts/drawer' ); ?>
<?php endif; ?>
</body>
</html>
