<?php
/**
 * header.php
 * 共通ヘッダ用テンプレート
 *
 * @package ws-minimalism
 */
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
<header class="l-header l-header--horizontal">
	<div class="l-header__contents l-container">
		<?php get_template_part( 'template-parts/header_title' ); ?>
		<?php
		if( has_nav_menu('header_nav_02') ) {
			wp_nav_menu(
				array(
					'theme_location' => 'header_nav_02',
					'container'       => 'div',
					'container_class' => 'l-header__contents__menu02 p-horizontalMenu p-horizontalMenu--arrowed',
					'menu_id' => 'header-nav-02',
					'menu_class' => 'menu p-horizontalMenu__nav c-nav',
					'link_before'      => '<span class="menu-label c-nav__item__label">',
					'link_after'      => '</span>',
				)
			);
		}
		?>
		<?php
		if( has_nav_menu('header_nav_01') ) {
			wp_nav_menu(
				array(
					'theme_location' => 'header_nav_01',
					'container'       => 'nav',
					'container_aria_label'       => 'Global navigation',
					'container_class' => 'l-header__contents__menu01 p-megaMenu',
					'menu_id' => 'header-nav-01',
					'menu_class' => 'menu p-megaMenu__nav c-nav',
					'link_before'      => '<span class="menu-label c-nav__item__label">',
					'link_after'      => '</span>',
				)
			);
		}
		?>
	</div>
</header>
<?php get_template_part( 'template-parts/drawer' ); ?>

<main class="l-main">
