<?php
/**
 * header.php
 *
 * @package ws-minimalism
 */

$mi_options_header = get_theme_mod( 'mi_options_header', 'large' );
$mi_options_drawer = get_theme_mod( 'mi_options_drawer', 'always' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="mi-l-header mi-l-header--<?php echo esc_attr($mi_options_header); ?> mi-l-header--drawer-<?php echo esc_attr($mi_options_drawer); ?>">
	<div class="mi-l-header__contents mi-l-container">

		<?php
			$mi_custom_logo_id = get_theme_mod( 'custom_logo' );
			$mi_custom_logo_src = wp_get_attachment_image_src( $mi_custom_logo_id, 'full' );
			$mi_custom_logo_width = $mi_custom_logo_src[1];
		?>
		<?php if( is_front_page() ): ?>
			<h1 class="mi-l-header__contents__siteTitle mi-p-siteTitle">
		<?php else: ?>
			<p class="mi-l-header__contents__siteTitle mi-p-siteTitle">
				<a href="<?php bloginfo('url'); ?>">
		<?php endif; ?>

		<?php if( $mi_custom_logo_src && $mi_custom_logo_width === 1 ): ?>
			<span class="mi-p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mi_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'">'; ?></span>
		<?php elseif( $mi_custom_logo_src ): ?>
			<span class="mi-p-siteTitle__logo"><?php echo '<img src="' . esc_url( $mi_custom_logo_src[0] ) . '" alt="'. get_bloginfo('name') .'" width="' . $mi_custom_logo_src[1] . '" height="' . $mi_custom_logo_src[2] . '">'; ?></span>
		<?php else: ?>
			<span class="mi-p-siteTitle__label"><?php bloginfo('name'); ?></span>
		<?php endif; ?>

		<?php if( is_front_page() ): ?>
			</h1>
		<?php else: ?>
				</a>
			</p>
		<?php endif; ?>

		<?php if( $mi_options_header !== 'small' ): ?>
		<div class="mi-l-header__top">

			<?php
			if( has_nav_menu('header_nav_01') && $mi_options_header !== 'large' ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_01',
						'container'       => 'nav',
						'container_aria_label'       => 'Global navigation',
						'container_class' => 'mi-l-header__contents__menu01 mi-p-megaMenu',
						'menu_id' => 'header-nav-01',
						'menu_class' => 'menu mi-p-megaMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

			<?php
			if( has_nav_menu('header_nav_02') && $mi_options_header === 'large' ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_02',
						'container'       => 'div',
						'container_class' => 'mi-l-header__contents__menu02 mi-p-horizontalMenu mi-p-horizontalMenu--arrowed',
						'menu_id' => 'header-nav-02',
						'menu_class' => 'menu mi-p-horizontalMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
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
						'container_class' => 'mi-l-header__contents__menu03 mi-p-horizontalMenu',
						'menu_id' => 'header-nav-03',
						'menu_class' => 'menu mi-p-horizontalMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
						'link_after'      => '</span>',
					)
				);
			}
			?>

		</div>
		<?php endif; ?>

		<?php if( $mi_options_header === 'large' ): ?>
		<div class="mi-l-header__bottom">

			<?php
			if( has_nav_menu('header_nav_01') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'header_nav_01',
						'container'       => 'nav',
						'container_aria_label'       => 'Global navigation',
						'container_class' => 'mi-l-header__contents__menu01 mi-p-megaMenu',
						'menu_id' => 'header-nav-01',
						'menu_class' => 'menu mi-p-megaMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
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
						'container_class' => 'mi-l-header__contents__menu04 mi-p-buttonMenu',
						'menu_id' => 'header-nav-04',
						'menu_class' => 'menu mi-p-buttonMenu__nav mi-c-nav',
						'link_before'      => '<span class="menu-label mi-c-nav__item__label">',
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

<main class="mi-l-main">
	<?php
		if( !is_front_page() ){
			get_template_part( 'template-parts/pageHeader' );
		}
	?>
