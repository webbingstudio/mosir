<?php
/**
 * drawer.php
 * Drawer Menu Template
 *
 * @package mosir
 *
 * @param array $args {
 *  mosi_options_header_layout: string,
 *  mosi_options_drawer_displaying: string,
 *  mosi_options_drawer_size: string,
 *  mosi_options_copyright: string | bool (not use)
 * }
 *
 */
?>
<div
	id="drawer"
	class="p-drawer p-drawer--<?php echo esc_attr( $args['mosi_options_drawer_displaying'] ); ?> p-drawer--size-<?php echo esc_attr( $args['mosi_options_drawer_size'] ); ?>"
	aria-label="Drawer menu"
	aria-hidden="true"
>
	<div class="p-drawer__close">
		<div class="p-drawer__close__contents l-container">
			<button
				id="mosi-drawer-close-top"
				class="js-mosi-drawer p-drawer__close__button c-toggleButton<?php echo $args['mosi_options_header_layout'] !== 'small' ? ' c-toggleButton--lg' : ''; ?>"
				aria-label="<?php echo __( 'Close this menu', 'mosir' ); ?>"
				aria-controls="drawer"
				aria-expanded="false"
				data-mosi-drawer-action="toggle"
				data-mosi-drawer-duration="500"
			>
				<span class="c-toggleButton__label">Menu</span>
				<span class="c-toggleButton__icon"></span>
			</button>
		</div>
	</div>
	<div class="p-drawer__contents">
		<div class="p-drawer__contents__inner l-container">
			<?php get_template_part( 'template-parts/drawer', 'contents', $args ); ?>
			<?php get_template_part( 'template-parts/drawer', 'footer', $args ); ?>
		</div>
	</div>
</div>
