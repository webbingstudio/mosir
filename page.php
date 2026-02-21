<?php
/**
 * page.php
 * Single post template for post type "page"
 *
 * @package mosir
 */

$mosi_post_type = get_post_type();
$mosi_post_ex_class = 'p-post p-post--' . esc_attr( $mosi_post_type );

get_header();
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( $mosi_post_ex_class ); ?>>
		<div class="p-post__contents <?php mosi_wp_block_class(); ?>">
			<?php the_content(); ?>
			<?php wp_link_pages( ); ?>
		</div>
	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>
</div>
<?php
get_footer();
