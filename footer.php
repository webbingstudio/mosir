<?php
/**
 * footer.php
 *
 * @package mosir
 */

$mosi_args = array(
	'mosi_options_header_layout' => get_theme_mod( 'mosi_options_header_layout', 'large' ),
	'mosi_options_drawer_displaying' => get_theme_mod( 'mosi_options_drawer_displaying', 'always' ),
	'mosi_options_drawer_size' => get_theme_mod( 'mosi_options_drawer_size', 'slim' ),
	'mosi_options_copyright' => get_theme_mod( 'mosi_options_copyright', (bool)false )
);

?>

<?php get_template_part( 'template-parts/main', 'bottom' ); ?>
</main>

<footer id="footer" class="l-footer">
	<div class="l-footer__contents l-container">
		<?php get_template_part( 'template-parts/footer', 'contents', $mosi_args ); ?>
	</div>
	<?php get_template_part( 'template-parts/footer', 'copyright', $mosi_args ); ?>
</footer>

<?php get_template_part( 'template-parts/sticky' ); ?>

<?php // close tag: div#mosi-drawer-contents.l-document ?>
</div>

<?php if( $mosi_args['mosi_options_drawer_displaying'] !== 'none' ): ?>
<?php get_template_part( 'template-parts/drawer', '', $mosi_args ); ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
