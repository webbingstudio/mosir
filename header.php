<?php
/**
 * header.php
 *
 * @package mosir
 */

$mo_options_header = get_theme_mod( 'mo_options_header', 'large' );
$mo_options_drawer = get_theme_mod( 'mo_options_drawer', 'always' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" id="wp-skip-link" href="#wp--skip-link--target">内容をスキップ</a>
<?php wp_body_open(); ?>
<header class="l-header l-header--<?php echo esc_attr($mo_options_header); ?> l-header--drawer-<?php echo esc_attr($mo_options_drawer); ?>">
	<div class="l-header__contents l-container">

		<?php
			$mo_custom_logo_id = get_theme_mod( 'custom_logo' );
			$mo_custom_logo_src = wp_get_attachment_image_src( $mo_custom_logo_id, 'full' );
			$mo_custom_logo_width = isset($mo_custom_logo_src[1]) ? $mo_custom_logo_src[1] : (bool)false;
		?>
		<?php if( is_front_page() ): ?>
			<h1 class="l-header__siteTitle p-siteTitle">
		<?php else: ?>
			<p class="l-header__siteTitle p-siteTitle">
				<a href="<?php bloginfo('url'); ?>">
		<?php endif; ?>

		<?php if( $mo_custom_logo_src && $mo_custom_logo_width ): ?>
			<span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mo_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'" width="' . $mo_custom_logo_src[1] . '" height="' . $mo_custom_logo_src[2] . '">'; ?></span>
		<?php elseif( $mo_custom_logo_src ): ?>
			<span class="p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mo_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'">'; ?></span>
		<?php else: ?>
			<span class="p-siteTitle__label"><?php bloginfo('name'); ?></span>
		<?php endif; ?>

		<?php if( is_front_page() ): ?>
			</h1>
		<?php else: ?>
				</a>
			</p>
		<?php endif; ?>

		<?php if( $mo_options_header !== 'small' ): ?>
		<div class="l-header__top">

			<?php
			if( has_nav_menu('header_nav_01') && $mo_options_header !== 'large' ) {
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
			if( has_nav_menu('header_nav_02') && $mo_options_header === 'large' ) {
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

		<?php if( $mo_options_header === 'large' ): ?>
		<div class="l-header__bottom">

			<?php
			if( has_nav_menu('header_nav_01') ) {
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
<?php get_template_part( 'template-parts/drawer' ); ?>

<main id="wp--skip-link--target" class="l-main">
