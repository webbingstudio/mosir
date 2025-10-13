<?php
/**
 * index.php
 * 一覧ページ用テンプレート
 *
 * @package ws-minimalism
 */

get_header();
?>

<p>index.php =============</p>

<?php if( have_posts() ): ?>
<div class="mx-auto max-w-7xl px-4">
<p>ここから投稿一覧 =============</p>
<?php while( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/loop' ); ?>
<?php endwhile; ?>

<p>投稿一覧終了 =============</p>
<?php get_template_part( 'template-parts/pager' ); ?>

<?php else: ?>
<p>投稿がありません =============</p>
<?php endif; ?>
<?php
get_footer();
