<?php
/**
 * header.php
 *
 * @package mosir
 *
 */

$mosi_custom_logo_id = get_theme_mod( 'custom_logo' );
$mosi_custom_logo_src = wp_get_attachment_image_src( $mosi_custom_logo_id, 'full' );

$mosi_args = array(
	'mosi_options_header_markup' => get_theme_mod( 'mosi_options_header_markup', 'h1' ),
	'mosi_options_header_layout' => get_theme_mod( 'mosi_options_header_layout', 'large' ),
	'mosi_options_drawer_displaying' => get_theme_mod( 'mosi_options_drawer_displaying', 'always' ),
	'mosi_custom_logo_src_url' => isset($mosi_custom_logo_src[0]) ? $mosi_custom_logo_src[0] : (bool)false,
	'mosi_custom_logo_width' => isset($mosi_custom_logo_src[1]) ? $mosi_custom_logo_src[1] : (bool)false,
	'mosi_custom_logo_height' => isset($mosi_custom_logo_src[2]) ? $mosi_custom_logo_src[2] : (bool)false
);
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
<a class="c-skip" id="skip-link" href="#main-content"><?php echo __( 'Skip to content', 'mosir' ); ?></a>

<?php wp_body_open(); ?>
<header id="header" class="l-header l-header--<?php echo esc_attr( $mosi_args['mosi_options_header_layout'] ); ?> l-header--drawer-<?php echo esc_attr( $mosi_args['mosi_options_drawer_displaying'] ); ?>">
	<div class="l-header__contents l-container">

		<?php get_template_part( 'template-parts/header', 'siteTitle', $mosi_args ); ?>

		<?php if( $mosi_args['mosi_options_header_layout'] !== 'simple' ): ?>
		<?php get_template_part( 'template-parts/header', 'top', $mosi_args ); ?>
		<?php endif; ?>

		<?php if( $mosi_args['mosi_options_drawer_displaying'] !== 'none' ): ?>
		<?php get_template_part( 'template-parts/header', 'drawerToggle', $mosi_args ); ?>
		<?php endif; ?>

		<?php if( $mosi_args['mosi_options_header_layout'] === 'large' ): ?>
		<?php get_template_part( 'template-parts/header', 'bottom', $mosi_args ); ?>
		<?php endif; ?>
	</div>
</header>
<main id="main-content" class="l-main">
