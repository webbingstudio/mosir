<?php
/**
 * page.php
 * 固定ページ用テンプレート
 *
 * @package mosir
 */

get_header();
$mi_post_type = get_post_type();
?>
<?php if( have_posts() ) : ?>
<div class="mi-p-<?php echo esc_attr($mi_post_type); ?>-contents mi-p-post mi-p-post--<?php echo esc_attr($mi_post_type); ?>">
	<div class="mi-p-post__contents <?php mi_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php
get_footer();
