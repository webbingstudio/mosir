<?php
/**
 * page-no-title.php
 *
 * Template Name: Page no title
 *
 * @package mosir
 */

$mosi_post_type = get_post_type();

get_header();
?>
<?php if( have_posts() ) : ?>
<div class="p-<?php echo esc_attr( $mosi_post_type ); ?>-contents p-post p-post--<?php echo esc_attr( $mosi_post_type ); ?>">
	<div class="p-post__contents <?php mosi_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php
get_footer();
