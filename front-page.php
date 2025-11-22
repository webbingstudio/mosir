<?php
/**
 * front-page.php
 * Website home template
 *
 * @package ws-minimalism
 */

get_header();
?>
<div class="mi-p-home">

	<?php
	// ==============================
	// Main visual
	// ==============================
	?>
	<div class="mi-p-home-mainVisual">
		<picture class="mi-p-home-mainVisual__image c-picture">
			<source media="(min-width:1200px)" srcset="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/mainvisual_25to10.jpg' ) ); ?> 1920w" sizes="(max-width:1919.9px) 100vw, 1920px">
			<source media="(min-width:768px)" srcset="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/mainvisual_16to9.jpg' ) ); ?> 1200w" sizes="(max-width:1023.9px) 100vw, 1200px">
			<img src="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/mainvisual_2to3.jpg' ) ); ?>" width="800" height="1200">
		</picture>
		<div class="mi-l-container mi-l-container--sm">
			<p lang="en" class="mi-p-home-mainVisual__title mi-c-title mi-c-title--lv1">minimalism</p>
			<p class="mi-p-home-mainVisual__tagline">WordPress scaffold theme</p>
		</div>
	</div>

	<?php
	// ==============================
	// Recent posts
	// ==============================

	$mi_args = array(
		'post_type'  => 'post',
		'posts_per_page'  => 3,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$mi_q = new WP_Query( $mi_args );
	?>
	<?php if( $mi_q->have_posts() ): ?>
	<div class="mi-p-home-recent">
		<div class="mi-p-home-recent__header mi-p-sectionHeader">
			<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv3 mi-c-title--center">ブログ</p>
			<p lang="en" class="mi-p-sectionHeader__subtitle mi-c-title mi-c-title--lv6 mi-c-title--center">Blog</p>
		</div>
		<div class="mi-p-home-recent__contents mi-p-posts mi-p-posts--media">
			<div class="mi-l-container mi-l-container--sm">
				<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'media' ); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>





</div>
<?php
get_footer();
