<?php
/**
 * single.php
 * 投稿詳細ページ用テンプレート
 *
 * @package ws-minimalism
 */

get_header();
?>

single.php =============

<p>投稿本文 =============</p>
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>

<h1>title: <?php the_title(); ?></h1>
<time datetime="<?php the_time('c'); ?>"><?php the_date(); ?></time>

<p>自由文ここから =============</p>
<div class="p-post__content <?php mi_wp_block_class(); ?>">
	<?php the_content(); ?>
</div>
<p>自由文終了 =============</p>

<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
