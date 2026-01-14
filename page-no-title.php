<?php
/**
 * page.php
 * 固定ページ用テンプレート
 *
 * Template Name: Page no title
 *
 * @package mosir
 */

get_header();
$mos_post_type = get_post_type();
?>
<?php if( have_posts() ) : ?>
<div class="p-<?php echo esc_attr($mos_post_type); ?>-contents p-post p-post--<?php echo esc_attr($mos_post_type); ?>">
	<div class="p-post__contents <?php mos_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
<?php
get_footer();
