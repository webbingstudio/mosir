<?php
/**
 * page.php
 * 固定ページ用テンプレート
 *
 * @package mosir
 */

$mosi_post_type = get_post_type();

get_header();
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>
	<div class="p-<?php echo esc_attr($mosi_post_type); ?>-contents p-post p-post--<?php echo esc_attr($mosi_post_type); ?>">
		<div class="p-post__contents <?php mosi_wp_block_class(); ?>">
			<?php the_content(); ?>
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
