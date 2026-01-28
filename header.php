<?php
/**
 * header.php
 *
 * @package mosir
 */

$mos_options_header_markup = get_theme_mod( 'mos_options_header_markup', 'h1' );
$mos_options_header_layout = get_theme_mod( 'mos_options_header_layout', 'large' );
$mos_options_drawer_displaying = get_theme_mod( 'mos_options_drawer_displaying', 'always' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mosi-drawer-contents" class="l-document">
<a class="skip-link screen-reader-text" id="wp-skip-link" href="#wp--skip-link--target">内容をスキップ</a>

<?php wp_body_open(); ?>
<header class="l-header l-header--<?php echo esc_attr($mos_options_header_layout); ?> l-header--drawer-<?php echo esc_attr($mos_options_drawer_displaying); ?>">
	<div class="l-header__contents l-container">

		<?php
			$mos_custom_logo_id = get_theme_mod( 'custom_logo' );
			$mos_custom_logo_src = wp_get_attachment_image_src( $mos_custom_logo_id, 'full' );
			$mos_custom_logo_width = isset($mos_custom_logo_src[1]) ? $mos_custom_logo_src[1] : (bool)false;
		?>
		<?php if( is_front_page() && $mos_options_header_markup === 'h1' ): ?>
			<h1 class="l-header__siteTitle p-siteTitle">
		<?php elseif( is_front_page() ): ?>
			<p class="l-header__siteTitle p-siteTitle">
		<?php else: ?>
			<p class="l-header__siteTitle p-siteTitle">
				<a href="<?php bloginfo('url'); ?>">
		<?php endif; ?>

		<?php if( $mos_custom_logo_src && $mos_custom_logo_width ): ?>
			<span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mos_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'" width="' . $mos_custom_logo_src[1] . '" height="' . $mos_custom_logo_src[2] . '">'; ?></span>
		<?php elseif( $mos_custom_logo_src ): ?>
			<span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mos_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'">'; ?></span>
		<?php else: ?>
			<span class="p-siteTitle__label"><?php bloginfo('name'); ?></span>
		<?php endif; ?>

		<?php if( is_front_page() && $mos_options_header_markup === 'h1' ): ?>
			</h1>
		<?php elseif( is_front_page() ): ?>
			</p>
		<?php else: ?>
				</a>
			</p>
		<?php endif; ?>

		<?php if( $mos_options_header_layout !== 'simple' ): ?>
		<div class="l-header__top">

			<?php
			if( has_nav_menu('header_nav_01') && $mos_options_header_layout !== 'large' ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_01',
						'container'       => 'nav',
						'container_aria_label'       => 'Global navigation',
						'container_class' => 'l-header__menu01 p-megaMenu',
						'menu_id' => 'header-nav-01',
						'menu_class' => 'menu p-megaMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

			<?php
			if( has_nav_menu('header_nav_02') && $mos_options_header_layout === 'large' ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_02',
						'container'       => 'div',
						'container_class' => 'l-header__menu02 p-horizontalMenu p-horizontalMenu--arrowed',
						'menu_id' => 'header-nav-02',
						'menu_class' => 'menu p-horizontalMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

			<?php
			if( has_nav_menu('header_nav_03') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_03',
						'container'       => 'div',
						'container_class' => 'l-header__menu03 p-horizontalMenu',
						'menu_id' => 'header-nav-03',
						'menu_class' => 'menu p-horizontalMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
		</div>
		<?php endif; ?>

		<?php if( $mos_options_drawer_displaying !== 'none' ): ?>
		<div class="l-header__drawerToggle p-drawerToggle p-drawerToggle--<?php echo esc_attr($mos_options_drawer_displaying); ?>">
			<div class="p-drawerToggle__contents l-container">
				<button aria-label="Open/close drawer menu" id="mosi-drawer-toggle" class="js-mosi-drawer p-drawerToggle__button c-toggleButton<?php echo $mos_options_header_layout !== 'small' ? ' c-toggleButton--lg' : ''; ?>" data-mosi-drawer-action="toggle" data-mosi-drawer-duration="500" aria-controls="drawer" aria-expanded="false">
					<span class="c-toggleButton__label">Menu</span>
					<span class="c-toggleButton__icon"></span>
				</button>
			</div>
		</div>
		<?php endif; ?>

		<?php if( $mos_options_header_layout === 'large' ): ?>
		<div class="l-header__bottom">

			<?php
			if( has_nav_menu('header_nav_01') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_01',
						'container'       => 'nav',
						'container_aria_label'       => 'Global navigation',
						'container_class' => 'l-header__menu01 p-megaMenu p-megaMenu--lg',
						'menu_id' => 'header-nav-01',
						'menu_class' => 'menu p-megaMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>
			<?php
			if( has_nav_menu('header_nav_04') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_04',
						'container'       => 'div',
						'container_class' => 'l-header__menu04 p-buttonMenu',
						'menu_id' => 'header-nav-04',
						'menu_class' => 'menu p-buttonMenu__nav c-nav',
						'link_before'      => '<span class="menu-label c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

		</div>
		<?php endif; ?>
	</div>
</header>
<main id="wp--skip-link--target" class="l-main">
