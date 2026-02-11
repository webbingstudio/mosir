<?php
/**
 * page-no-title.php
 *
 * Template Name: Page no title
 *
 * @package mosir
 */

$mosi_post_type = get_post_type();
$mosi_post_ex_class = 'p-post p-post--' . esc_attr( $mosi_post_type );

get_header();
?>
<?php if( have_posts() ) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $mosi_post_ex_class ); ?>>
	<div class="p-post__contents <?php mosi_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( ); ?>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php
get_footer();
