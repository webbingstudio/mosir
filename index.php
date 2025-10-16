<?php
/**
 * index.php
 * 一覧ページ用テンプレート
 *
 * @package ws-minimalism
 */

get_header();
?>

<?php if( have_posts() ): ?>
<div class="mi-p-posts">
    <div class="mi-p-posts__container mi-l-container--sm">
        <?php while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/loop' ); ?>
        <?php endwhile; ?>
    </div>
</div>

<p>投稿一覧終了 =============</p>
<?php get_template_part( 'template-parts/pager' ); ?>

<?php else: ?>
<p>投稿がありません =============</p>
<?php endif; ?>
<?php
get_footer();
