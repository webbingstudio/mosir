<?php
/**
 * page.php
 * 固定ページ用テンプレート
 *
 * @package mosir
 */

get_header();
?>

page.php =============

<p>投稿本文 =============</p>
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>

<p>自由文ここから =============</p>
<div class="p-post__contents <?php mi_wp_block_class(); ?>">
	<?php the_content(); ?>
</div>
<p>自由文終了 =============</p>

<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
