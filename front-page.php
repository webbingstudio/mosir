<?php
/**
 * front-page.php
 * Website home template
 *
 * @package mosir
 */

get_header();
?>
<?php
// ==============================
// Contents of front page
// ==============================
if( have_posts() ) :
?>
<section class="p-post p-post--page">
	<div class="p-post__contents <?php mos_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>

<?php get_template_part( 'template-parts/recent', 'headline' ); ?>
<?php get_template_part( 'template-parts/recent', 'headline-2col' ); ?>
<?php get_template_part( 'template-parts/recent', 'headline-no-meta' ); ?>
<?php get_template_part( 'template-parts/recent', 'media' ); ?>
<?php get_template_part( 'template-parts/recent', 'media-2col' ); ?>
<?php get_template_part( 'template-parts/recent', 'card' ); ?>
<?php get_template_part( 'template-parts/recent', 'card-2col' ); ?>

<?php
get_footer();
